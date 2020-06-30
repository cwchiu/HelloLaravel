<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/blog') }}">Hello Blog</a>
        <form class="navbar-form navbar-left" role="search" method="GET" action="{{ route('blog.search.get') }}">
            <div class="form-group">
                <input type="text" class="form-control" name="keyword" placeholder="搜尋文章">
            </div>
            <button type="submit" class="btn btn-default">搜尋</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
	
            <li class="navbar-text">
                {{ Auth::user()->name }}
            </li>
            <li>
                <a href="{{ url('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">登出</a>
                                                     
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
            </li>
                
            @else
            <li>
                <a href="{{ route('blog.login') }}">登入</a>
            </li>                
            @endif
            <li>
                <a href="{{ url('/') }}">首頁</a>
            </li>   
        </ul>
    </div>
</nav>
<div style="padding-top: 70px"><div>