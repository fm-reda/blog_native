<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container-fluid">

        <!-- buttonleft -->
        <!-- <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button> -->
        <button class="m-3 px-3 menu-btn justify-content-start bg-dark">&#9776; Menu</button>

        <!-- button right -->
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <!-- menu right -->
        <style>
            .dropdown>.dropdown-menu {
                top: 200%;
                transition: 0.3s all ease-in-out;
            }

            .dropdown:hover>.dropdown-menu {
                display: block;
                top: 100%;
            }

            .dropdown>.dropdown-toggle:active {
                /*Without this, clicking will make it sticky*/
                pointer-events: none;
            }
        </style>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ">
                <a class="navbar-brand text-white" href="index-blog.php">Mon blog</a>

                <li class="nav-item active">
                    <div class="container">
                        <div class="dropdown">

                            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="categorie.php">All categorie</a>
                                <a class="dropdown-item" href="#">Cat 1</a>
                                <a class="dropdown-item" href="#">Cat 2</a>
                                <a class="dropdown-item" href="#">Cat 3</a>
                            </div>
                        </div>
                    </div>
                </li>



                <li class="nav-item">
                    <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline border-black btn-dark  my-2 my-sm-0 " type="submit">Search</button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>