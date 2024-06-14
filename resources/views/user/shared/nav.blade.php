<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{url('/home')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{url('profile/'.auth()->user()->name. '/edit')}}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('user.order.list')}}">
                <i class="bi bi-journal-text"></i>
                <span>Package History</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('user.order.create')}}">
                <i class="bi bi-journal-text"></i>
                <span>Order Request</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" target="_blank" href="{{env('WEB_URL')}}faqs/">
                <i class="bi bi-question-circle"></i>
                <span>FAQs</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('user.contact')}}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

    </ul>

</aside><!-- End Sidebar-->