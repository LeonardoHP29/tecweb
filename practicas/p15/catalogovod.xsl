<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" doctype-public="-//W3C//DTD HTML 5//EN" encoding="UTF-8" indent="yes"/>
    <xsl:template match="/">
        <html>
            <head>
                <meta charset="UTF-8"/>
                <title>Catálogo VOD</title>
                <style>
                    body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                    background-color: #f9f9f9;
                    }
                    
                    header img {
                    width: 200px;
                    }
                    
                    table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 20px 0;
                    background-color: #fff;
                    border: 1px solid #ccc;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    }
                    
                    th, td {
                    padding: 10px;
                    text-align: left;
                    border: 1px solid #ddd;
                    }
                    
                    th {
                    background-color: #0073e6;
                    color: #fff;
                    font-weight: bold;
                    text-transform: uppercase;
                    }
                    
                    tr:nth-child(even) {
                    background-color: #f2f2f2; 
                    }
                    
                    tr:hover {
                    background-color: #eaf4ff;
                    }
                    
                    h1, h2 {
                    color: #333;
                    }
                    
                    footer {
                    text-align: center;
                    margin-top: 20px;
                    color: #666;
                    font-size: 0.9em;
                    }
                </style>
            </head>
            <body>
                <h1>Catálogo de Video</h1>
                <h2>Películas</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Duración</th>
                            <th>Género</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="CatalogoVOD/contenido/peliculas/genero">
                            <xsl:variable name="genero" select="@nombre"/>
                            <xsl:for-each select="titulo">
                                <tr>
                                    <td><xsl:value-of select="."/></td>
                                    <td><xsl:value-of select="@duracion"/></td>
                                    <td><xsl:value-of select="$genero"/></td>
                                </tr>
                            </xsl:for-each>
                        </xsl:for-each>
                    </tbody>
                </table>
                <h2>Series</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Duración</th>
                            <th>Género</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="CatalogoVOD/contenido/series/genero">
                            <xsl:variable name="genero" select="@nombre"/>
                            <xsl:for-each select="titulo">
                                <tr>
                                    <td><xsl:value-of select="."/></td>
                                    <td><xsl:value-of select="@duracion"/></td>
                                    <td><xsl:value-of select="$genero"/></td>
                                </tr>
                            </xsl:for-each>
                        </xsl:for-each>
                    </tbody>
                </table>
                <footer>
                </footer>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
