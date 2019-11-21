<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/ims/php/modals/UserModal.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ims/php/modals/CompanyModal.php';

class Dashboard {

    function getNavigation($id) {
        $CompanyModal = new CompanyModal();
        $CompanyName = $CompanyModal->getCompanyData("Company_Name");

        $UserModal = new UserModal();
        $UserType = $UserModal->getUserData("User_Type");

        $string[] = array();
        $string[0] = "";
        $string[1] = "";
        $string[2] = "";
        $string[3] = "";
        $string[4] = "";
        $string[5] = "";
        $string[6] = "";
        $string[7] = "";
        $string[8] = "";
        $string[9] = "";
        $string[$id] = "active";

        $hide = "";

        if($UserType == "EMPLOYEE") {
            $hide = "d-none";
        } else {
            $hide = "";
        }

        echo "<nav class=\"navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white\" id=\"sidenav-main\">
    <div class=\"container-fluid\">
        <!-- Toggler -->
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#sidenav-collapse-main\" aria-controls=\"sidenav-main\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <!-- Brand -->
        <a class=\"navbar-brand pt-2 mb-md--2\" style=\"font-family: 'Roboto', sans-serif;\">
            <h2 class='text-white text-uppercase'><span class='bg-primary rounded p-2'>" . $CompanyName . "</span></h2>
        </a>
        <!-- User -->
        <ul class=\"nav align-items-center d-md-none\">
            <li class=\"nav-item dropdown\">
                <a class='nav-link' href=\"#\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    <i class='fa fa-user fa-lg text-dark'></i>
                </a>
                <div class=\"dropdown-menu dropdown-menu-arrow dropdown-menu-right\">
                    <div class=\" dropdown-header noti-title\">
                        <h6 class=\"text-overflow m-0\">Welcome!</h6>
                    </div>
                    <div class=\"dropdown-divider\"></div>
                    <a href='logout.php' class=\"dropdown-item\">
                        <i class=\"ni ni-user-run\"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class=\"collapse navbar-collapse \" id=\"sidenav-collapse-main\">
            <!-- Collapse header -->
            <div class=\"navbar-collapse-header d-md-none\">
                <div class=\"row\">
                    <div class=\"col-6 collapse-brand\">
                        <a>
                            <h2 class='text-primary text-uppercase'>" . $CompanyName . "</h2>
                        </a>
                    </div>
                    <div class=\"col-6 collapse-close\">
                        <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#sidenav-collapse-main\" aria-controls=\"sidenav-main\" aria-expanded=\"false\" aria-label=\"Toggle sidenav\">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <ul class=\"navbar-nav\">
                <li class=\"nav-item\">
                    <a class='nav-link " . $string[0] . "' href=\" ./dashboard.php\"> <i class=\"ni ni-tv-2 text-indigo\"></i> Dashboard
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a class='nav-link " . $string[1] . "' href=\"./company.php\">
                        <i class=\"fa fa-building text-blue\"></i> Company
                    </a>
                </li>
            </ul>
            <hr class=\"my-3\">
            <h6 class=\"navbar-heading text-muted\">Inventory</h6>
            <ul class='navbar-nav'>    
                <li class=\"nav-item $hide\">
                    <a class='nav-link " . $string[2] . "' href=\"./supplier.php\">
                        <i class=\"fa fa-industry\" style='color: #ed213a;'></i> Supplier
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a class='nav-link " . $string[3] . "' href=\"./categories.php\">
                        <i class=\"ni ni-bullet-list-67 text-red\"></i> Categories
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a class='nav-link " . $string[4] . "' href=\"./products.php\">
                        <i class=\"fa fa-archive text-orange\"></i> Products
                    </a>
                </li>
                <li class=\"nav-item $hide\">
                    <a class='nav-link " . $string[5] . "' href=\"./stores.php\">
                        <i class=\"fa fa-store text-purple\"></i> Stores
                    </a>
                </li>
                <li class=\"nav-item $hide\">
                    <a class='nav-link " . $string[6] . "' href=\"./orders.php\">
                        <i class=\"fa fa-shopping-cart text-info\"></i> Orders
                    </a>
                </li>
                <li class=\"nav-item $hide\">
                    <a class='nav-link " . $string[7] . "' href=\"./users.php\">
                        <i class=\"ni ni-single-02 text-green\"></i> Users
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class=\"my-3\">
            <!-- Heading -->
            <h6 class=\"navbar-heading text-muted\">Services</h6>
            <!-- Navigation -->
            <ul class=\"navbar-nav mb-md-3\">
                <li class=\"nav-item $hide\">
                    <a class='nav-link " . $string[8] . "' href='settings.php'>
                        <i class=\"fa fa-cog\"></i> Settings
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a class='nav-link " . $string[9] . "' href=\"./privacy-policy.php\">
                        <i class=\"fa fa-lock\"></i> Privacy Policy
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>";
    }

    function getHeader() {
        $UserModal = new UserModal();

        $CompanyModal = new CompanyModal();
        $CompanyName = $CompanyModal->getCompanyData("Company_Name");

        echo "<!-- Navbar -->
    <nav class=\"navbar navbar-top navbar-expand-md navbar-dark\" id=\"navbar-main\">
        <div class=\"container-fluid\">
            <!-- Brand -->
            <a class=\"h4 mb-0 text-white text-uppercase d-none d-lg-inline-block\" href=\"./dashboard.php\">" . $CompanyName . "</a>

            <!-- User -->
            <ul class=\"navbar-nav align-items-center d-none d-md-flex\">
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link pr-0\" href=\"#\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <div class=\"media align-items-center\">
                <span class=\"avatar avatar-sm rounded-circle bg-transparent\">
                    <i class='fa fa-user-circle fa-2x text-dark'></i>
                </span>
                            <div class=\"media-body ml-2 d-none d-lg-block\">
                                <span class=\"mb-0 text-sm  font-weight-bold\">" . $UserModal->getUserData("User_FullName") ."</span>
                            </div>
                        </div>
                    </a>
                    <div class=\"dropdown-menu dropdown-menu-arrow dropdown-menu-right\">
                        <div class=\" dropdown-header noti-title\">
                            <h6 class=\"text-overflow m-0\">Welcome!</h6>
                        </div>
                        <div class=\"dropdown-divider\"></div>
                        <a href='logout.php' class=\"dropdown-item\">
                            <i class=\"ni ni-user-run\"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>";
    }
}