package una.acr.appexamenaxel.view.activities;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.DialogInterface;
import android.content.Intent;
import android.database.Cursor;
import android.os.Bundle;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import es.dmoral.toasty.Toasty;
import una.acr.appexamenaxel.R;
import una.acr.appexamenaxel.data.ClienteData;
import una.acr.appexamenaxel.domain.Cliente;
import una.acr.appexamenaxel.domain.Favorito;
import una.acr.appexamenaxel.domain.Producto;
import una.acr.appexamenaxel.network.VolleySingleton;
import una.acr.appexamenaxel.utils.NetworkUtils;
import una.acr.appexamenaxel.view.adapters.ProductoAdapter;
import una.acr.appexamenaxel.view.interfaces.ProductoCallback;

public class FavoritosActivity extends AppCompatActivity {

    private ClienteData clienteData;
    private  ArrayList<Favorito> favoritos;
    private ArrayList<Producto> productos;

    private RecyclerView recyclerFavoritos;
    private ProductoAdapter adaptador;

    int numProductosPorRecibir;
    int numProductosRecibidos;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_favoritos);
        clienteData = new ClienteData(this);
        Intent intent = getIntent();
        Cliente c = (Cliente)  getIntent().getSerializableExtra("cliente");
        Cursor cursor = clienteData.obtenerFavoritosCliente(c.getId());
        favoritos = new ArrayList<>();
        productos = new ArrayList<>();
        while(cursor.moveToNext()){
            favoritos.add(new Favorito(cursor.getInt(0),cursor.getInt(1),cursor.getInt(2)));
        }
        cursor.close();
       // Toast.makeText(getApplicationContext(),String.valueOf(cursor.getCount()),Toast.LENGTH_SHORT).show();
        /*if(clienteData.insertarFavoritos(new Favorito(1,5)) == -1){
            Toast.makeText(getApplicationContext(),"Error al agregar",Toast.LENGTH_SHORT).show();
        }else{
            Toast.makeText(getApplicationContext(),"Agregado con éxito",Toast.LENGTH_SHORT).show();
        }*/

        numProductosPorRecibir = favoritos.size();
        numProductosRecibidos = 0;
        for (Favorito f: favoritos) {
            obtenerProducto(f.getProductoid(), new ProductoCallback() {
                @Override
                public void onSuccess(Producto producto) {
                    productos.add(producto);
                    numProductosRecibidos++;
                    if (numProductosRecibidos == numProductosPorRecibir) {

                        adaptador.notifyDataSetChanged();
                    }
                }

                @Override
                public void onError(Exception e) {
                    throw new RuntimeException(e);
                }
            });
        }

        recyclerFavoritos = findViewById(R.id.recycler_cliente_favoritos);
        recyclerFavoritos.setLayoutManager(new LinearLayoutManager(this,RecyclerView.VERTICAL,false));
        adaptador  = new ProductoAdapter (productos, getApplicationContext());
        recyclerFavoritos.setAdapter(adaptador);

        if (favoritos.isEmpty()) {
           // Toasty.info(getApplicationContext(), "No tiene productos favoritos asociados", Toast.LENGTH_LONG, true).show();

            AlertDialog.Builder builder = new AlertDialog.Builder(FavoritosActivity.this);

            builder.setMessage("¿Desea vincular productos favoritos ahora?")
                    .setTitle("Sin productos favoritos");

            builder.setPositiveButton("Sí", new DialogInterface.OnClickListener() {
                public void onClick(DialogInterface dialog, int id) {

                    Intent intent = new Intent(getApplicationContext(), VincularFavoritosActivity.class);
                    intent.putExtra("cliente",c);
                    startActivity(intent);
                    finish();
                }
            });
            builder.setNegativeButton("No", new DialogInterface.OnClickListener() {
                public void onClick(DialogInterface dialog, int id) {
                    // User clicked No button
                    dialog.dismiss();
                }
            });

            // Create and show the dialog
            AlertDialog dialog = builder.create();
            dialog.show();
        }


        /* ]*/
      //  Toast.makeText(getApplicationContext(),"Total de productos "+productos.get(0).getRutaImagen(),Toast.LENGTH_SHORT).show();

    }

    private void obtenerProducto(int productoid, ProductoCallback callback) {
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(Request.Method.GET, NetworkUtils.HTTP+NetworkUtils.IP+NetworkUtils.RUTA_PRODUCTO+"?metodo=obtenerProductosCliente&id="+productoid, null, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                try {
                    JSONObject jsonObject = response.getJSONObject(0);
                    Producto p = new Producto();
                    p.setId(jsonObject.getInt("productoid"));
                    p.setNombre(jsonObject.getString("productonombre"));
                    p.setCantidad(jsonObject.getInt("productocantidad"));
                    p.setRutaImagen(jsonObject.getString("productoimagen"));
                    p.setDetalles(jsonObject.getString("productodetalles"));
                    callback.onSuccess(p);
                } catch (JSONException e) {
                    callback.onError(e);
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                callback.onError(error);
            }
        });
        VolleySingleton.getVolleySingleton(getApplicationContext()).addToRequestQueue(jsonArrayRequest);
    }


}