<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
<link rel="stylesheet" href="admin_css/admin_main.css">
  <title>Document</title>
</head>
<body>
                      <!-- main header -->
  <div class="main-header">
    <div class="admin-sign-in"><i class="fas fa-user"></i></div>
    <div class="admin-sign-out"><i class="fas fa-external-link-alt"></i></div>
    <div class="admin-home-page"><i class="fas fa-home"></i></div>
  </div>

                                <!-- Search Engine -->
                          

  <div class="admin-search">
    <div class="admin-search-div">
          <input class="admin-search-input" type="text" name="admin-search" placeholder="Search by Name or Email"> 
          <i class="fas fa-search" id="admin-search-font"></i>
    </div>  
  <div class="search-by-country">
    <select name="" id="select-country">
      <option value="Cyprus">Cyprus</option>
      <option value="Germany">Germany</option>
      <option value="Ireland">Ireland</option>
      <option value="USA">USA</option>
      <option value="France">France</option>
    </select>
  </div>
  <div class="search-by-age"><p style="text-align:center;">Search By Age</p>
        From <select name="" id="search-from">
              <option value="" selected></option>
              <option value="20">20</option>
              <option value="">21</option>
              <option value="">22</option>
              <option value="">23</option>
              <option value="">24</option>
              <option value="">25</option>
              <option value="">26</option>
              <option value="">27</option>
              <option value="">28</option>
              <option value="">29</option>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        To <select name="" id="search-to">
        <option value="" selected></option>
              <option value="20">20</option>
              <option value="">21</option>
              <option value="">22</option>
              <option value="">23</option>
              <option value="">24</option>
              <option value="">25</option>
              <option value="">26</option>
              <option value="">27</option>
              <option value="">28</option>
              <option value="">29</option>
        </select>
  </div>
</div>
</body>
</html>