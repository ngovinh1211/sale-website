<?php
class Login extends Controller
{

    public $error;

    function login()
    {

        $url = $this->getUrl();
        
        if($this->checkUserLogin()){
            header("Location: $url");
            die();
        }

        if (!empty($_POST)) {
            $email = $this->getPost('email');
            $pwd = $this->getMD5Security($this->getPost('pwd'));

            $accountModel = $this->model('AccountModel');
            $data = $accountModel->userLogin($email, $pwd);

            if ($data == null) {
                $this->error = 'Login Failed';
                header("Refresh:1");
                die();
            }

            $_SESSION['currentUser'] = $data;

            $token = $this->getMD5Security($data['email'] . time() . $data['id']);

            setcookie('userToken', $token, time() + 30 * 60, '/');

            $accountModel->createToken($token, $data['id']);

            header("Location: $url");
        }

        $this->view('user', [
            'component' => 'login',
            'title' => 'Login',
            'url'=>$url,
            'error' => $this->error
        ]);
    }

    function logout(){
        $url = $this->getUrl();

        if (!$this->checkUserLogin()) {
            header("Location: $url");
        }

        unset($_SESSION['currentUser']);
        setcookie('userToken', '', time(), "/");

        header("Location: $url");
    }
}
