<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <body>
                <xsl:for-each select="universite/Groupe">
                    <h2>Groupe Numéro <xsl:value-of select="@numero"/> (composé de <xsl:value-of select="count(etudiant)"/> étudiants) </h2>
                    <ol>
                        <xsl:for-each select="etudiant">
                            <li><xsl:value-of select="."/></li>
                        </xsl:for-each>
                    </ol>
                </xsl:for-each>
            </body>
        </html>


    </xsl:template>


</xsl:stylesheet>