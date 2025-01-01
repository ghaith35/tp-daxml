<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:fo="http://www.w3.org/1999/XSL/Format">
    
    <!-- Define the template for the city page -->
    <xsl:template match="/ville">
        <fo:layout-master-set>
            <fo:simple-page-master master-name="A4" page-height="297mm" page-width="210mm">
                <fo:region-body margin="20mm"/>
            </fo:simple-page-master>
        </fo:layout-master-set>

        <fo:page-sequence master-reference="A4">
            <fo:flow flow-name="xsl-region-body">
                
                <!-- City Title -->
                <fo:block font-size="18pt" font-weight="bold" text-align="center">
                    <xsl:value-of select="@nom"/>
                </fo:block>
                
                <!-- City Description -->
                <fo:block margin-top="10mm">
                    <xsl:value-of select="descriptif"/>
                </fo:block>

                <!-- Sites -->
                <fo:block margin-top="10mm">
                    <fo:block font-size="14pt" font-weight="bold">Sites</fo:block>
                    <fo:list-block>
                        <xsl:for-each select="sites/site">
                            <fo:list-item>
                                <fo:list-item-label>
                                    <fo:block><xsl:value-of select="@nom"/></fo:block>
                                </fo:list-item-label>
                                <fo:list-item-body>
                                    <fo:block><xsl:value-of select="photo"/></fo:block>
                                </fo:list-item-body>
                            </fo:list-item>
                        </xsl:for-each>
                    </fo:list-block>
                </fo:block>

                <!-- Hotels -->
                <fo:block margin-top="10mm">
                    <fo:block font-size="14pt" font-weight="bold">Hotels</fo:block>
                    <fo:list-block>
                        <xsl:for-each select="hotels/hotel">
                            <fo:list-item>
                                <fo:list-item-label>
                                    <fo:block><xsl:value-of select="."/></fo:block>
                                </fo:list-item-label>
                            </fo:list-item>
                        </xsl:for-each>
                    </fo:list-block>
                </fo:block>

                <!-- Restaurants -->
                <fo:block margin-top="10mm">
                    <fo:block font-size="14pt" font-weight="bold">Restaurants</fo:block>
                    <fo:list-block>
                        <xsl:for-each select="restaurants/restaurant">
                            <fo:list-item>
                                <fo:list-item-label>
                                    <fo:block><xsl:value-of select="."/></fo:block>
                                </fo:list-item-label>
                            </fo:list-item>
                        </xsl:for-each>
                    </fo:list-block>
                </fo:block>

                <!-- Transport -->
                <fo:block margin-top="10mm">
                    <fo:block font-size="14pt" font-weight="bold">Transport</fo:block>
                    <fo:block font-size="12pt" font-weight="bold">Gares</fo:block>
                    <fo:list-block>
                        <xsl:for-each select="gares/gare">
                            <fo:list-item>
                                <fo:list-item-label>
                                    <fo:block><xsl:value-of select="."/></fo:block>
                                </fo:list-item-label>
                            </fo:list-item>
                        </xsl:for-each>
                    </fo:list-block>
                    <fo:block font-size="12pt" font-weight="bold">Aéroports</fo:block>
                    <fo:list-block>
                        <xsl:for-each select="aeroports/aeroport">
                            <fo:list-item>
                                <fo:list-item-label>
                                    <fo:block><xsl:value-of select="."/></fo:block>
                                </fo:list-item-label>
                            </fo:list-item>
                        </xsl:for-each>
                    </fo:list-block>
                </fo:block>

            </fo:flow>
        </fo:page-sequence>
    </xsl:template>

</xsl:stylesheet>
