package una.acr.appexamenaxel.data;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

import una.acr.appexamenaxel.utils.DBUtils;

public class ExamenDBHelper extends SQLiteOpenHelper {

    public ExamenDBHelper(@Nullable Context context) {
        super(context, DBUtils.BASE_DE_DATOS, null, DBUtils.VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(DBUtils.CREAR_TABLA_CLIENTE);
        db.execSQL(DBUtils.CREAR_TABLA_FAVORITOS);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
}
