<?
  session_start(); 
  
  include "../../../kernel/db.php";
  include "../../../kernel/CUserData.php";
  include "../../../kernel/CGameData.php";
  include "../../../kernel/CAccountant.php";
  include "../../template/CTemplate.php";
  include "../CMarket.php";
  include "CClothes.php";
  
  $db=new db();
  $gd=new CGameData($db);
  $ud=new CUserData($db);
  $template=new CTemplate();
  $acc=new CAccountant($db, $template);
  $market=new CMarket($db, $acc, $template);
  $clothes=new CClothes($db, $acc, $template, $market);
  
  switch ($_REQUEST['act'])
  {
	  case "browse" : $clothes->showClothesPage($_REQUEST['prod'],
	                                            $_REQUEST['tip'], 
												$_REQUEST['stars'], 
												true); 
					  break;
					  
	  case "browse_items" : $market->showItems($_REQUEST['prod'],
	                                            $_REQUEST['tip'], 
												$_REQUEST['stars'], 
												true);
							break;
							
	  case "rent" : $market->rent($_REQUEST['ID'], $_REQUEST['txt_rent_qty_'.$_REQUEST['ID']]); 
	                break;
							
	  case "buy" : $market->buy($_REQUEST['ID'], $_REQUEST['txt_buy_qty_'.$_REQUEST['ID']]); 
	               break;
  }
?>