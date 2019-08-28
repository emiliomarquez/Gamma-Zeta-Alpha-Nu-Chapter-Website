<?xml version="1.0" encoding="utf-8"?><!-- DWXMLSource="http://gammazetaalpha.ucsd.edu/Events.xml" -->
<!DOCTYPE xsl:stylesheet  [
	<!ENTITY nbsp   "&#160;">
	<!ENTITY copy   "&#169;">
	<!ENTITY reg    "&#174;">
	<!ENTITY trade  "&#8482;">
	<!ENTITY mdash  "&#8212;">
	<!ENTITY ldquo  "&#8220;">
	<!ENTITY rdquo  "&#8221;"> 
	<!ENTITY pound  "&#163;">
	<!ENTITY yen    "&#165;">
	<!ENTITY euro   "&#8364;">
]><xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" encoding="utf-8"/>
<xsl:template match="/">
    <div id="events">
	<xsl:for-each select="events/event">
    	<div class="event">
        <h2><xsl:value-of select="name" /></h2>
        <p><xsl:value-of select="type" />
        	<xsl:if test="collaboration" >
            	<em><xsl:value-of select="collaboration" /></em>
            </xsl:if>
        </p>
        <p><xsl:value-of select="description" /></p>
        </div>
    </xsl:for-each>
    </div>
</xsl:template>
</xsl:stylesheet>