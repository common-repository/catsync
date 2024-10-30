<table>
  <tr>
    <td> 
      <select id="box1View" name="sourceColumnList" multiple="multiple" style="height:200px;width:200px;">

<?php
//Loads the previous configuration left by the user
if(!empty($sourceInner))
{
    echo str_replace(array("#","|","@"),array("<",">","\""),$sourceInner);
}
?>

      </select>
    </td>
    <td>
      <button id="to2" type="button" style="width: 35px;">&nbsp;>&nbsp;</button><br/>
	  <button id="allTo2" type="button" style="width: 35px;">&nbsp;>>&nbsp;</button><br/>
	  <button id="allTo1" type="button" style="width: 35px;">&nbsp;<<&nbsp;</button><br/>
	  <button id="to1" type="button" style="width: 35px;">&nbsp;<&nbsp;</button>
	</td>
    <td>
      <select id="box2View" multiple="multiple" name="selectColumnList" style="height:200px;width:200px;">

<?php
//Loads the previous configuration left by the user
if(!empty($destInner))
{
    echo str_replace(array("#","|","@"),array("<",">","\""),$destInner);
}
?>

      </select>
    </td>
  </tr>
</table>
<!--
Responsible for storing values for column headings and inner htmls for source and destination boxes.
This is done to persist the last configuration left by user
-->
<input type="hidden" id="selectColumns" name="selectColumns" value="<?php echo $postCols; ?>"></input>
<input type="hidden" id="sourceInner" name="sourceInner" value="<?php echo $sourceInner;?>"></input>
<input type="hidden" id="destInner" name="destInner" value="<?php echo $destInner; ?>"></input>
