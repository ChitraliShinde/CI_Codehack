<body>
<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <?= anchor('dashboard', img(array('src'=>'assets/img/logo/logosn.png','border'=>'0','alt'=>'CodeHack','class'=>'main-logo','title'=>'CodeHack'))); ?>
                <strong><a href="<?= base_url('dashboard'); ?>"><img src="<?= base_url('assets/img/logo/logosn.png'); ?>" alt="" title="CodeHack"/></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a href="<?= base_url('dashboard'); ?>">
                                   <span class="educate-icon educate-home icon-wrap" title="Dashboard"></span>
                                   <span class="mini-click-non" title="Dashboard">Dashboard</span>
                            </a>
                        </li>
                        <li id="removable">
                            <a class="has-arrow" href="<?= base_url('pages'); ?>" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap" title="Pages"></span> <span class="mini-click-non" title="Pages">Pages</span></a>
                            <ul class="submenu-angle form-mini-nb-dp" aria-expanded="false">
                                <li><a title="Login" href="<?= base_url('login'); ?>"><span class="mini-sub-pro">Login</span></a></li>
                                <li><a title="Register" href="<?= base_url('login/admin_registration'); ?>"><span class="mini-sub-pro">Register</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="<?= base_url('blog'); ?>" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap" title="Blog"></span> <span class="mini-click-non" title="Blog">Blog</span></a>
                            <ul class="submenu-angle form-mini-nb-dp" aria-expanded="false">
                                <li><a title="Add Article" href="<?= base_url('dashboard/add_article'); ?>"><span class="mini-sub-pro">Add Article</span></a></li>
                                <li><a title="View Articles" href="<?= base_url('dashboard/view_articles'); ?>"><span class="mini-sub-pro">View Articles</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>