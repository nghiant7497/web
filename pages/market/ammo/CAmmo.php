<?
class CAmmo
{
    function CAmmo($db, $acc, $template, $market)
	{
		$this->kern=$db;
		$this->acc=$acc;
		$this->template=$template;
		$this->market=$market;
	}
	
	function showSelectMenu($prod)
	{
		?>
            
           <input type="hidden" id="menu_selected" name="menu_selected" value="ID_CAR_Q1">
           <table width="560" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0">
		      <tr>
		        <td width="85" align="center">
                <a href="../ammo/main.php?trade_prod=ID_BULLETS_PISTOL">
                <img src="./GIF/pistol_<? if ($prod=="ID_BULLETS_PISTOL") print "on"; else print "off"; ?>.png" id="img_1" style="cursor:pointer" title="Pistol bullets" data-toggle="tooltip" data-placement="top"/>
                </a>
                </td>
		        
                <td width="85" align="center">
                <a href="../ammo/main.php?trade_prod=ID_BULLETS_SHOTGUN">
                <img src="./GIF/shotgun_<? if ($prod=="ID_BULLETS_SHOTGUN") print "on"; else print "off"; ?>.png" id="img_2" style="cursor:pointer" title="Shotgun Bullets" data-toggle="tooltip" data-placement="top"/>
                </a>
                </td>
		        
                <td width="85" align="center">
                <a href="../ammo/main.php?trade_prod=ID_BULLETS_AKM">
                <img src="./GIF/akm_<? if ($prod=="ID_BULLETS_AKM") print "on"; else print "off"; ?>.png" id="img_3" style="cursor:pointer" title="AKM Bullets" data-toggle="tooltip" data-placement="top"/>
                </a>
                </td>
		      
                <td width="258" align="center">&nbsp;</td>
		        </tr>
		      </table></td>
		    </tr>
		  <tr>
		    <td align="center"><img src="../../template/GIF/menu_sub_bar.png" /></td>
		    </tr>
		  </table>
          
         
        
        <?
	}
}
?>