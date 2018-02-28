<?
class CMods
{
	function CMods($db, $thislate)
	{
		$this->kern=$db;
		$this->template=$thislate;
	}
	
	function showNav($sel=1)
	{
		?>
        
           <nav class="navbar navbar-inverse navbar-fixed-top">
           <div class="container">
           <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
          
		  <?
		      switch ($sel)
			  {
				  case 1 : print "Advertising"; break;
				  case 2 : print "Articles"; break;
				  case 3 : print "Profiles"; break;
			  }
		  ?>
          
          </a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Choose Section<span class="caret"></span>            </a>
            <ul class="dropdown-menu">
            <li><a href="ads.php">Advertising</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="profiles.php">Profiles</a></li>
            </ul>
            </li>
            </ul>
      
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br /><br /><br /><br /><br />
        
        <?
	}
	
	function showYesNo($id, $sel="")
	{
		print "<select id='".$id."' name='".$id."' class='form-control' style='width:100px'>";
		
		if ($sel=="ID_YES")
		     print "<option value='Y' selected>Yes</option>";
		   else
		     print "<option value='Y'>Yes</option>";
			 
		   if ($sel=="ID_NO")
		     print "<option value='N' selected>No</option>";
		   else
		     print "<option value='N'>No</option>";
	
		
		print "</select>";
	}
	
	function showProdTypesDD($id, $sel="")
	{
		$query="SELECT * FROM tipuri_produse WHERE name<>'' ORDER BY name ASC";
		$result=$this->kern->execute($query);	
	  
		print "<select id='".$id."' name='".$id."' class='form-control'>";
		
		print "<option value=''>None</option>";
		
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
		   if ($row['prod']==$sel)
		     print "<option value='".$row['prod']."' selected>".$row['name']."</option>";
		   else
		     print "<option value='".$row['prod']."'>".$row['name']."</option>";
		}
		
		print "</select>";
	}
	
	function showLicTypesDD($id, $sel="")
	{
		$query="SELECT * FROM tipuri_licente WHERE lic_name<>'' AND lic_type='ID_PROD' ORDER BY lic_name ASC";
		$result=$this->kern->execute($query);	
	  
		print "<select id='".$id."' name='".$id."' class='form-control'>";
		
		print "<option value=''>None</option>";
		
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
		   if ($row['prod']==$sel)
		     print "<option value='".$row['tip']."' selected>".$row['lic_name']."</option>";
		   else
		     print "<option value='".$row['tip']."'>".$row['lic_name']."</option>";
		}
		
		print "</select>";
	}
	
	function showComTypesDD($id, $sel)
	{
		$query="SELECT * FROM tipuri_companii ORDER BY tip_name ASC";
		$result=$this->kern->execute($query);	
	  
		print "<select id='".$id."' name='".$id."' class='form-control'>";
		
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
		   if ($sel==$row['tip'])
		      print "<option selected value='".$row['tip']."'>".$row['tip_name']."</option>";
		   else
		      print "<option value='".$row['tip']."'>".$row['tip_name']."</option>";
		}
		
		print "</select>";
	}
	
	function showNewBut($link, $txt)
	{
		?>
        
           <table width="700" border="0" cellspacing="0" cellpadding="0">
           <tr>
           <td align="right"><a href="<? print $link; ?>" class="btn btn-success"><? print $txt; ?></a></td>
           </tr>
           </table>
           <br><br>
        
        <?
	}
	
	function showSearch()
	{
		?>
            
<form action="<? print $_SERVER['../../temp/temp/PHP_SELF']; ?>">
            <input class="form-control" id="txt_search" name="txt_search" style="width:600px" placeholder="Search" value="<? print $_REQUEST['txt_search']; ?>"></input>
            </form>
            <br><br>
            
        <?
	}
	
	function showUnitate($sel="")
	{
		print "<select id='dd_unitate' name='dd_unitate' class='form-control' style='width:150px'>";
		
		if ($sel=="barill")
		      print "<option selected value='barril'>Barril</option>";
		   else
		      print "<option value='barril'>Barril</option>";
			  
	    if ($sel=="pc")
		      print "<option selected value='pc'>Piece</option>";
		   else
		      print "<option value='pc'>Piece</option>";
			  
	    if ($sel=="sm")
		      print "<option selected value='sm'>Square Meter</option>";
		   else
		      print "<option value='sm'>Square Meter</option>";
			  
			  
	    if ($sel=="cm")
		      print "<option selected value='cm'>Cubic Meter</option>";
		   else
		      print "<option value='cm'>Cubic Meter</option>";
			  
		if ($sel=="kg")
		      print "<option selected value='kg'>Kilogram</option>";
		   else
		      print "<option value='kg'>Kilogram</option>";
			  
		if ($sel=="kw")
		      print "<option selected value='kg'>Kilowatts</option>";
		   else
		      print "<option value='kg'>Kilowatts</option>";
			  
	    if ($sel=="gr")
		      print "<option selected value='gr'>Grams</option>";
		   else
		      print "<option value='gr'>Grams</option>";
		
		print "</select>";
	}
	
	
	function del($table, $ID)
	{		
		// Tipuri produse
		if ($table=="tipuri_produse")
		{
			$query="SELECT * FROM tipuri_produse WHERE ID='".$ID."'";
			$result=$this->kern->execute($query);	
	        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	        $prod=$row['prod'];
			
			$query="DELETE FROM tipuri_licente WHERE prod='".$prod."'"; 
			$this->kern->execute($query);	
			
			$query="DELETE FROM com_prods WHERE prod='".$prod."'";
			$this->kern->execute($query);	
		}
		
		$query="DELETE FROM ".$table." WHERE ID='".$ID."'"; 
		$result=$this->kern->execute($query);
		
		switch ($table)
		{
			case "tipuri_produse" : $this->kern->redirect("tipuri_produse.php?txt_search=".$_REQUEST['txt_search']); break;
			case "com_prods" : $this->kern->redirect("com_prods.php?com=".$_REQUEST['com']); break;
			case "default_lic" : $this->kern->redirect("default_lic.php?com=".$_REQUEST['com']); break;
			case "allow_trans" : $this->kern->redirect("allow_trans.php?com=".$_REQUEST['com']); break;
			case "tipuri_licente" : $this->kern->redirect("tipuri_licente.php?com=".$_REQUEST['com']); break;
			case "taxes" : $this->kern->redirect("taxes.php?com=".$_REQUEST['com']); break;
			case "v_mkts_orders" : $this->kern->redirect("markets.php?prod=".$_REQUEST['prod']); break;
		}
	}
	
	function showModalHeader($id, $txt, $name_1="", $val_1="", $name_2="", $val_2="", $name_3="", $val_3="", $name_4="", $val_4="", $action="")
	{
		?>
        
           <div class="modal fade" id="<? print $id; ?>">
           <div class="modal-dialog">
           <div class="modal-content">
           <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" align="center" id="modal_title"><? print $txt; ?></h4>
           </div>
           <form method="post" action="<? print $action; ?>" enctype="multipart/form-data">
           <div class="modal-body">
        
        <?
		
		  if ($name_1!="") print "<input type='hidden' name='".$name_1."' id='".$name_1."' value='".$val_1."'/>";
		  if ($name_2!="") print "<input type='hidden' name='".$name_2."' id='".$name_2."' value='".$val_2."'/>";
		  if ($name_3!="") print "<input type='hidden' name='".$name_3."' id='".$name_3."' value='".$val_3."'/>";
		  if ($name_4!="") print "<input type='hidden' name='".$name_4."' id='".$name_4."' value='".$val_4."'/>";
	}
	
	function showModalFooter($but_1_txt="Close", $but_2_txt="Send")
	{
		?>
        
             </div>
             <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal" onclick="format()"><? print $but_1_txt; ?></button>
             <button type="submit" class="btn btn-primary btn-success" onclick="format()"><? print $but_2_txt; ?></button>
             </div>
             </form>
             </div></div></div>
        
        <?
	}
}
?>