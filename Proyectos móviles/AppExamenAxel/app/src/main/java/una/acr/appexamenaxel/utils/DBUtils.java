package una.acr.appexamenaxel.utils;

public class DBUtils {
    public static final String BASE_DE_DATOS = "examenaxel";
    public static final String CLIENTE = "tbcliente";
    public static final String FAVORITOS = "tbfavorito";

    public static final String CREAR_TABLA_CLIENTE = "CREATE TABLE "+ CLIENTE+
            " (clienteid INTEGER PRIMARY KEY AUTOINCREMENT, clientenombre VARCHAR(225), clientetelefono INTEGER, clienteactivo INTEGER);";
    public static final String CREAR_TABLA_FAVORITOS = "CREATE TABLE "+FAVORITOS+
            " (favoritoid INTEGER PRIMARY KEY AUTOINCREMENT, favoritoclienteid INTEGER, favoritoproductoid INTEGER);";
    public static final int VERSION = 1;

    public static final String CONSULTAR_CLIENTES = "SELECT * FROM tbcliente";
    public static final String CONSULTAR_FAVORITOS_CLIENTE = "SELECT * FROM `tbfavorito` \n" +
            "INNER JOIN tbcliente ON tbcliente.clienteid = tbfavorito.favoritoclienteid\n" +
            "WHERE tbcliente.clienteid = ";

    public static final String VERIFICAR_FAVORITO ="SELECT * FROM `tbfavorito` \n" +
            "INNER JOIN tbcliente ON tbcliente.clienteid = tbfavorito.favoritoclienteid\n" +
            "WHERE tbcliente.clienteid = ";
}
