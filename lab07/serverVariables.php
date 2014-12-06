<?php
session_start();

echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Lab 07 - Server Variables</title>
	<meta charset="utf-8" />
</head>

<body>
<h1 style="font-size:14pt; text-indent:360px;">Lab 07 - Server Variables</h1>

<?php ?>
<p>
HTTP_HOST:     <strong><?php echo($_SERVER["HTTP_HOST"]); ?></strong><br/>
REMOTE_HOST:   <strong><?php echo($_SERVER["REMOTE_HOST"]); ?></strong>
</p>

<?php ?>
<table style="width:500px; padding:1px; margin:1px; border:0px;" title="Listing of Server Variables">
	<thead>
    	<tr>
        	<th style="border:1px solid #0000000;">Key</th>
            <th style="border:1px solid #0000000;">Value</th>
        </tr>
    </thead>
    <tfoot>
    	<tr>
        	<td><em>a listing of server variables</em></td>
        </tr>
    </tfoot>
    <tbody>
    	<?php
		foreach($_SERVER as $key=>$value)
		{
			?>
            <tr>
            	<td style="border:1px solid #0000000;"><?php echo $key; ?></td>
                <td style="border:1px solid #0000000;"><?php echo $value; ?></td>
            </tr>
            <?php
		}
		?>
    </tbody>
</table>
</body>
</html>
        
       












