<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=$data['url']?>/admin">
  <div class="sidebar-brand-icon rotate-n-15">
  <i class="fas fa-file-user"></i>
  </div>
  <div class="sidebar-brand-text mx-3" style="font-size: 14px; margin:0;">LIBERTY ELECTRONICS</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="<?=$data['url']?>/admin">
    <i class="fas fa-home"></i>
    <span>Home</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-user"></i>
    <span>Account</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Account Management:</h6>
      <a class="collapse-item" href="<?=$data['url']?>/admin/adminAccount">Admin Information</a>
      <a class="collapse-item" href="<?=$data['url']?>/admin/userAccount">User Information</a>
      <a class="collapse-item" href="<?=$data['url']?>/admin/register">Create New Account</a>
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
  <i class="fas fa-list"></i>
    <span>Product</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Product Management:</h6>
      <a class="collapse-item" href="<?=$data['url']?>/admin/product">Products</a>
      <a class="collapse-item" href="<?=$data['url']?>/admin/createProduct">Create New Product</a>
      <a class="collapse-item" href="<?=$data['url']?>/admin/recycle">Recycle</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Pages Management:</h6>
      <a class="collapse-item" href="<?=$data['url']?>/admin/brand">Brand</a>
      <a class="collapse-item" href="<?=$data['url']?>/admin/category">Category</a>
      <a class="collapse-item" href="<?=$data['url']?>/admin/color">Color</a>
      <a class="collapse-item" href="<?=$data['url']?>/admin/storage">Storage</a>
    </div>
  </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?=$data['url']?>/admin/order">
    <i class="fas fa-cart-plus"></i>
    <span>Orders</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="<?=$data['url']?>/admin/feedback">
    <i class="fas fa-fw fa-table"></i>
    <span>Feedbacks</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>