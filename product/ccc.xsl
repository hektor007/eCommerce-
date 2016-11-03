<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

<xsl:template match="/">
<html>
<body>
<h2> ALL PRODUCTS </h2>
<table border="0">
<tr bgcolor="#0fc0fc">
<th style="text-align:">id</th>
<th style="text-align:left">product_name</th>
<th style="text-align:left">product_price</th>
</tr>
<xsl:for-each select="courses/products_list">
<tr>
<td><xsl:value-of select="id" /></td>
<td><xsl:value-of select="product_name" /></td>
<td><xsl:value-of select="product_price" /></td>
</tr>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>