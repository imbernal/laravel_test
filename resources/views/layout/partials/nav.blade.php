<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <form class="navbar-form navbar-left" method="get" action="/search">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Search by City">
                </div>
                <button type="submit" class="btn btn-default">Search by City</button>
            </form>

            <form class="navbar-form navbar-left" method="get" action="/search_by_date">
                <div class="form-group">
                    <input type="text" class="form-control" name="daterange" value="">
                </div>
                <button type="submit" class="btn btn-default">Search by Date</button>
            </form>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>