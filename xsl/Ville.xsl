<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <!-- Root template -->
    <xsl:template match="/">
        <html>
            <head>
                <title>
                    <xsl:value-of select="/ville/@nom" /> - City Guide
                </title>
                <style>
                    /* Add CSS styles here for better presentation */
                    body { font-family: Arial, sans-serif; }
                    h1 { color: #2c3e50; }
                    .section { margin-bottom: 20px; }
                </style>
            </head>
            <body>
                <h1>Welcome to <xsl:value-of select="/ville/@nom" /></h1>
                
                <!-- City Description -->
                <div class="section">
                    <h2>Description</h2>
                    <p>
                        <xsl:value-of select="/ville/descriptif" />
                    </p>
                </div>
                
                <!-- Sites Section -->
                <div class="section">
                    <h2>Sites to Visit</h2>
                    <ul>
                        <xsl:for-each select="/ville/sites/site">
                            <li>
                                <b><xsl:value-of select="@nom" /></b>
                                <br />
                                <img src="{@photo}" alt="{@nom}" style="width:200px;height:auto;" />
                            </li>
                        </xsl:for-each>
                    </ul>
                </div>
                
                <!-- Hotels Section -->
                <div class="section">
                    <h2>Hotels</h2>
                    <ul>
                        <xsl:for-each select="/ville/hotels/hotel">
                            <li><xsl:value-of select="." /></li>
                        </xsl:for-each>
                    </ul>
                </div>
                
                <!-- Restaurants Section -->
                <div class="section">
                    <h2>Restaurants</h2>
                    <ul>
                        <xsl:for-each select="/ville/restaurants/restaurant">
                            <li><xsl:value-of select="." /></li>
                        </xsl:for-each>
                    </ul>
                </div>
                
                <!-- Train Stations Section -->
                <div class="section">
                    <h2>Train Stations</h2>
                    <ul>
                        <xsl:for-each select="/ville/gares/gare">
                            <li><xsl:value-of select="." /></li>
                        </xsl:for-each>
                    </ul>
                </div>
                
                <!-- Airports Section -->
                <div class="section">
                    <h2>Airports</h2>
                    <ul>
                        <xsl:for-each select="/ville/aéroports/aéroport">
                            <li><xsl:value-of select="." /></li>
                        </xsl:for-each>
                    </ul>
                </div>
                
                <!-- Transform to PDF Button -->
                <div class="section">
                    <button onclick="alert('PDF transformation feature not implemented yet.')">Generate PDF</button>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
