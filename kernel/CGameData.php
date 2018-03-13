<?
class CGameData
{
	function CGameData($db)
	{
		$this->kern=$db;
		
		// Load game data
		$query="SELECT * 
		          FROM web_sys_data";
		
		// Load data
		$result=$this->kern->execute($query);	
		
		// Row
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		// Maintainance
		if ($row['status']=="ID_OFFLINE") 
		   die ("Maintainance in progress.");
		
		
		if ($_REQUEST['sd']['status']=="OFFLINE")
		{
		   if (strpos($_SERVER['REQUEST_URI'], "pages")>0)	
		      $this->kern->redirect("../../maintainance/maintainance/index.php");
		   else
		      $this->kern->redirect("./pages/maintainance/maintainance/index.php");
		}
		
		// Data
		$_REQUEST['sd']['node_adr']=$row['node_adr'];
		$_REQUEST['sd']['mining_adr']=$row['mining_adr'];
		$_REQUEST['sd']['new_acc_reward']=$row['new_acc_reward'];
		$_REQUEST['sd']['coin_price']=$row['coin_price']; 
		$_REQUEST['sd']['mining_threads']=$row['mining_threads']; 
		
		// Net stat
		$query="SELECT * FROM net_stat";
		$result=$this->kern->execute($query);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		// Data
		$_REQUEST['sd']['last_block']=$row['last_block'];
		$_REQUEST['sd']['last_block_hash']=$row['last_block_hash'];
		$_REQUEST['sd']['net_dif']=$row['net_dif'];
		$_REQUEST['sd']['delegate']=$row['delegate'];
		
		// Sys stats
		$query="SELECT * FROM sys_stats";
		$result=$this->kern->execute($query);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		// Data
		$_REQUEST['sd']['total_energy']=$row['total_energy'];
		$_REQUEST['sd']['total_aff']=$row['total_aff'];
		$_REQUEST['sd']['total_war_points']=$row['total_war_points'];
		$_REQUEST['sd']['total_pol_inf']=$row['total_pol_inf'];
		$_REQUEST['sd']['total_pol_end']=$row['total_pol_end'];
	}
}
?>