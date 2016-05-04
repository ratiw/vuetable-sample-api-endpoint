<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>vuetable - Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <style>
        /* Move down content because we have a fixed navbar that is 50px tall */
        body {
          padding-top: 50px;
          padding-bottom: 20px;
        }
        ul.dropdown-menu li {
            margin-left: 20px;
        }
        .vuetable th.sortable:hover {
            color: #2185d0;
            cursor: pointer;
        }
        .vuetable-actions {
            width: 11%;
            padding: 12px 0px;
            text-align: center;
        }
        .vuetable-actions > button {
          padding: 3px 6px;
          margin-right: 4px;
        }
        .vuetable-pagination {
        }
        .vuetable-pagination-info {
            float: left;
            margin-top: auto;
            margin-bottom: auto;
        }
        ul.pagination {
          margin: 0px;
        }
        .vuetable-pagination-component {
          float: right;
        }
        [v-cloak] {
            display: none;
        }
        .highlight {
            background-color: yellow;
        }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
            </div><!--/.navbar-collapse -->
        </div>
    </nav>

    <div id="app" class="container">
      <!-- Example row of columns -->
        <h2 class="sub-header">List of Users</h2>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <div class="form-inline form-group">
                    <label>Search:</label>
                    <input v-model="searchFor" class="form-control" @keyup.enter="setFilter">
                    <button class="btn btn-primary" @click="setFilter">Go</button>
                    <button class="btn btn-default" @click="resetFilter">Reset</button>
                </div>
            </div>
            <div class="col-md-7">
                <div class="dropdown form-inline pull-right">
                    <label>Pagination:</label>
                    <select class="form-control" v-model="paginationComponent">
                        <option value="vuetable-pagination-bootstrap">vuetable-pagination-bootstrap</option>
                        <option value="vuetable-pagination-dropdown">vuetable-pagination-dropdown</option>
                    </select>
                    <label>Per Page:</label>
                    <select class="form-control" v-model="perPage">
                        <option value=10>10</option>
                        <option value=15>15</option>
                        <option value=20>20</option>
                        <option value=25>25</option>
                    </select>
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-cog"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li v-for="field in fields">
                            <span class="checkbox">
                                <label>
                                    <input type="checkbox" v-model="field.visible">
                                    @{{ field.title == '' ? field.name.replace('__', '') : field.title | capitalize }}
                                </label>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <vuetable v-ref:vuetable
                api-url="http://vuetable.ratiw.net/api/users"
                pagination-path=""
                :fields="fields"
                :sort-order="sortOrder"
                table-class="table table-bordered table-striped table-hover"
                ascending-icon="glyphicon glyphicon-chevron-up"
                descending-icon="glyphicon glyphicon-chevron-down"
                pagination-class=""
                pagination-info-class=""
                pagination-component-class=""
                :pagination-component="paginationComponent"
                :item-actions="itemActions"
                :per-page="perPage"
                :append-params="moreParams"
            ></vuetable>
        </div>

        <hr>

        <footer>
            <p>&copy; 2015 Company, Inc.</p>
        </footer>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="/js/webpack_bootstrap.js">
    </script>
  </body>
</html>
