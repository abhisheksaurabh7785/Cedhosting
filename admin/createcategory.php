<?php
 
//include('../Dbcon.php');
//include('../User.php');
require_once('header.php');
if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  // $pid=$_POST['pid'];
  $plink=$_POST['plink'];
  //   $avail=$_POST['avail'];
  $User=new User();
 	$Dbcon=new dbconnection();
 
 	$sql=$User->Category($name,$plink,$Dbcon->conn);
 	// echo $sql;
  
}
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $User=new User();
  $Dbcon=new dbconnection();
  
  $sql=$User->deleteCategory($id,$Dbcon->conn);
  
  echo "deleted";
}
?>

<div class="container">
  <h2>Create Category</h2>
  <form action="createcategory.php" method="Post">
    <div class="form-group">
      
      <input type="text" class="form-control" id="nam" placeholder="Hosting" name="nam" disabled>
    </div>
    <div class="form-group">
      
      <input type="text" class="form-control" id="pid" placeholder="Category Name" name="name">
    </div>
    <div class="form-group">
 
      <input type="text" class="form-control" id="plink" placeholder="Enter Product Link" name="plink">
    </div>
    
    <button type="submit" name="submit" value="Create Category" class="btn btn-default">Submit</button>
  </form>
    </br>
</div>
 
  

<div class="container-fluid mt--10">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Category table</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="id">id</th>
                    <th scope="col" class="sort" data-sort="budget">Category</th>
                    <th scope="col" class="sort" data-sort="status">SubCategory</th>
                    <th scope="col">Links</th>
                    <th scope="col" class="sort" data-sort="completion">Available</th>
                    <th scope="col"class="sort" data-sort="completion">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                 

                <?php 

                $User=new User();
                $Dbcon=new dbconnection();
             
                $name = isset($_POST['name'])?$_POST['name']:'';
                $plink=isset($_POST['plink'])?$_POST['plink']:'';
               

                $sql=$User -> categorytable($name,$plink,$Dbcon->conn);


                foreach ($sql as $key) {

                ?>





                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                       
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo $key['prod_parent_id']; ?>
                        </span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                    <?php echo "Hosting" ?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status"><?php echo $key['prod_name']; ?></span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <?php echo $key['html'] ?>
                       
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">

                        <?php $key['prod_available'];
                         if($key['prod_available']=='1')
                         {
                           echo "IS AVAILABLE";
                         }
                         else {
                           echo "not available";
                         }
                        
                        
                        ?>
                        </span>
                        <div>
                          
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">

                       
                        <a href="editCreatecategory.php?action=1&id=<?php echo  $key['id'];?>" class="showtable">Edit</a>
                        <a onclick="javascript: return confirm('are you sure?');" href="createcategory.php?id=<?php echo  $key['id'];?>" class="showtable">Delete</a>
                        </span>
                        <div>
                          
                        </div>
                      </div>
                    </td>
                    <!-- <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td> -->
                  </tr>
                 
                    
                 
                
              
<?php }?>
</tbody>
</table>
            </div>