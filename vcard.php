<?php 
header('Content-disposition: attachment; filename=vCard.vcf'); 
header('Content-type: text/x-vcard'); 
readfile('vCard.vcf'); 
?>