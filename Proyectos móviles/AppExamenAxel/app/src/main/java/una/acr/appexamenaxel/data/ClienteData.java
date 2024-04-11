package una.acr.appexamenaxel.data;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import una.acr.appexamenaxel.data.ExamenDBHelper;
import una.acr.appexamenaxel.domain.Cliente;
import una.acr.appexamenaxel.domain.Favorito;
import una.acr.appexamenaxel.utils.DBUtils;

public class ClienteData {
    private ExamenDBHelper helper;
    private SQLiteDatabase db;

    public ClienteData(Context context) {
        helper = new ExamenDBHelper(context);
    }

    public long insertarCliente(Cliente c){
        db = helper.getWritableDatabase();
        ContentValues valores = new ContentValues();
        valores.put("clientenombre",c.getNombre());
        valores.put("clientetelefono",c.getTelefono());
        valores.put("clienteactivo",c.getActivo());
        return db.insert(DBUtils.CLIENTE,null,valores);
    }

    public long insertarFavoritos(Favorito f){
        db = helper.getWritableDatabase();
        ContentValues valores = new ContentValues();
        valores.put("favoritoclienteid",f.getClienteid());
        valores.put("favoritoproductoid",f.getProductoid());
        return db.insert(DBUtils.FAVORITOS,null,valores);
    }

    public int actualizarCliente(Cliente c){
        db = helper.getWritableDatabase();
        ContentValues valores = new ContentValues();
        valores.put("clientetelefono",c.getTelefono());
        valores.put("clienteactivo",c.getActivo());
        return db.update(DBUtils.CLIENTE, valores, "clienteid = ?",new String[]{String.valueOf(c.getId())});
    }

    public Cursor obtenerClientes(){
        db = helper.getReadableDatabase();
        Cursor cursor = db.rawQuery(DBUtils.CONSULTAR_CLIENTES, null);
        return cursor;
    }

    public Cursor obtenerClientesActivos(){
        db = helper.getReadableDatabase();
        Cursor cursor = db.rawQuery(DBUtils.CONSULTAR_CLIENTES+" WHERE clienteactivo = 1", null);
        return cursor;
    }

    public Cursor obtenerFavoritosCliente(int clienteid){
        db = helper.getReadableDatabase();
        Cursor cursor = db.rawQuery(DBUtils.CONSULTAR_FAVORITOS_CLIENTE+clienteid, null);
        return cursor;
    }

    public int verificarFavorito(int clienteid, int productoid){
        db = helper.getReadableDatabase();
        Cursor cursor = db.rawQuery(DBUtils.CONSULTAR_FAVORITOS_CLIENTE+clienteid+" AND favoritoproductoid = "+productoid, null);
        int total = cursor.getCount();
        return total;
    }
}
