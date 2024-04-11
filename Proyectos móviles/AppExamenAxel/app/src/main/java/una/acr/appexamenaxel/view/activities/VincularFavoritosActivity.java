package una.acr.appexamenaxel.view.activities;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.database.Cursor;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.toptoche.searchablespinnerlibrary.SearchableSpinner;

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

public class VincularFavoritosActivity extends AppCompatActivity {

    private SearchableSpinner spinnerClientes, spinnerProductos;
    private ArrayList<String> productosString, clientesString;
    private ArrayList<Cliente> listaClientes;
    private ArrayList<Producto> listaProductos, listaFavoritos;
    private Button btnAgregarFavorito, btnVincularFavoritos, btnRegresar;

    private ClienteData clienteData;
    private RecyclerView recyclerFavoritos;
    private ProductoAdapter adaptador;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_vincular_favoritos);
        clienteData = new ClienteData(this);
        spinnerClientes = findViewById(R.id.spinner_clientes);
        spinnerProductos = findViewById(R.id.spinner_productos);
        spinnerProductos.setTitle("Seleccione un producto");
        spinnerProductos.setPositiveButton("OK");
        spinnerClientes.setTitle("Seleccione un cliente");
        spinnerClientes.setPositiveButton("OK");

        productosString = new ArrayList<>();
        clientesString = new ArrayList<>();
        listaClientes = new ArrayList<>();
        listaProductos = new ArrayList<>();
        listaFavoritos = new ArrayList<>();
        btnAgregarFavorito = findViewById(R.id.btn_agregar_spi_producto);
        btnVincularFavoritos = findViewById(R.id.btn_vincular_favorito);
        btnRegresar = findViewById(R.id.btn_regresar_vinc);


        obtenerClientes();
        obtenerProductos();

        Intent intent = getIntent();
        if (intent != null && intent.getExtras() != null) {
            Cliente c = (Cliente) getIntent().getSerializableExtra("cliente");
            int position = 0;
            for (int i = 0; i < listaClientes.size(); i++) {
                if (listaClientes.get(i).getId() == c.getId()) {
                    position = i;
                    break;
                }
            }

            spinnerClientes.setSelection(position);
        }





        btnAgregarFavorito.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (spinnerClientes.getSelectedItemPosition() == Spinner.INVALID_POSITION ||
                        spinnerProductos.getSelectedItemPosition() == Spinner.INVALID_POSITION) {
                    Toasty.info(getApplicationContext(), "Debe seleccionar un cliente y un producto", Toast.LENGTH_SHORT, true).show();
                    return;
                }

                Producto p = listaProductos.get(spinnerProductos.getSelectedItemPosition());
                Cliente c = listaClientes.get(spinnerClientes.getSelectedItemPosition());
                if(clienteData.verificarFavorito(c.getId(),p.getId())>0){
                    Toasty.info(getApplicationContext(), "El producto ya existe en sus favoritos", Toast.LENGTH_SHORT, true).show();
                    //Toast.makeText(getApplicationContext(), "El producto ya existe en sus favoritos", Toast.LENGTH_SHORT).show();
                }else{
                    obtenerProducto(p.getId(), new ProductoCallback() {
                        @Override
                        public void onSuccess(Producto producto) {

                            boolean agregado = false;
                            for (Producto favorito : listaFavoritos) {
                                if (favorito.getId() == producto.getId()) {
                                    agregado = true;
                                    break;
                                }
                            }
                            if (!agregado) {

                                listaFavoritos.add(producto);
                                adaptador.notifyDataSetChanged();
                            } else {
                                Toasty.info(getApplicationContext(), "El producto ya ha sido agregado", Toast.LENGTH_SHORT, true).show();
                                //Toast.makeText(getApplicationContext(), "El producto ya ha sido agregado", Toast.LENGTH_SHORT).show();
                            }
                        }

                        @Override
                        public void onError(Exception e) {
                            Toasty.error(getApplicationContext(), "Error obteniendo el producto", Toast.LENGTH_SHORT, true).show();
                            //  Toast.makeText(getApplicationContext(), "Error obteniendo el producto", Toast.LENGTH_SHORT).show();
                        }
                    });

                }
            }
        });


        recyclerFavoritos = findViewById(R.id.recycler_vincular_fav);
        recyclerFavoritos.setLayoutManager(new LinearLayoutManager(this,RecyclerView.VERTICAL,false));
        adaptador  = new ProductoAdapter (listaFavoritos, getApplicationContext());
        recyclerFavoritos.setAdapter(adaptador);

        btnVincularFavoritos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                ArrayList<Producto> listaProductos = adaptador.getLista();
                Boolean insertado = false;
                int clienteid = listaClientes.get(spinnerClientes.getSelectedItemPosition()).getId();
                for(int i = 0; i < listaProductos.size(); i++){
                    Producto p = listaProductos.get(i);
                    Favorito f = new Favorito(clienteid,p.getId());

                    if(clienteData.insertarFavoritos(f) == -1){
                        insertado = false;
                    }else{
                        insertado = true;
                    }
                }

                if(insertado){
                    Toasty.success(getApplicationContext(), "Agregados con éxito", Toast.LENGTH_SHORT, true).show();
                   // Toast.makeText(getApplicationContext(), "Agregados con éxito", Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(VincularFavoritosActivity.this,MainActivity.class);
                    startActivity(intent);
                    finish();
                }else{
                    Toasty.error(getApplicationContext(), "Error al agregar favoritos", Toast.LENGTH_SHORT, true).show();
                    //Toast.makeText(getApplicationContext(), "Error al agregar favoritos", Toast.LENGTH_SHORT).show();
                }

                //Toast.makeText(getApplicationContext(), "Total elementos: "+listaProductos.size()+" "+clienteid, Toast.LENGTH_SHORT).show();
            }
        });

        btnRegresar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(VincularFavoritosActivity.this, MainActivity.class);
                startActivity(intent);
                finish();
            }
        });

    }

    private void obtenerProductos(){

        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(Request.Method.GET, NetworkUtils.HTTP+NetworkUtils.IP+NetworkUtils.RUTA_PRODUCTO+"?metodo=obtener", null, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                try {
                    for (int i = 0; i < response.length(); i++) {
                        JSONObject jsonObject = response.getJSONObject(i);

                        Producto p = new Producto();
                        p.setId(jsonObject.getInt("productoid"));
                        p.setNombre(jsonObject.getString("productonombre"));
                        p.setCantidad(jsonObject.getInt("productocantidad"));
                        p.setRutaImagen(jsonObject.getString("productoimagen"));
                        p.setDetalles(jsonObject.getString("productodetalles"));

                        listaProductos.add(p);
                        productosString.add(p.getNombre());
                    }

                    ArrayAdapter<String> productosAdapter = new ArrayAdapter<String>(getApplicationContext(), R.layout.simple_spinner_item, productosString);
                    productosAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                    spinnerProductos.setAdapter(productosAdapter);

                    //Toast.makeText(getApplicationContext(),"Total: "+listaProductos.size(),Toast.LENGTH_SHORT).show();
                } catch (JSONException e) {
                    Toasty.error(getApplicationContext(), "Error al obtener productos", Toast.LENGTH_SHORT, true).show();
                    //Toast.makeText(getApplicationContext(),"chispero",Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("anyText",error.toString());
                Toasty.error(getApplicationContext(), "Error al obtener productos", Toast.LENGTH_SHORT, true).show();
            }
        });
        VolleySingleton.getVolleySingleton(getApplicationContext()).addToRequestQueue(jsonArrayRequest);

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

    private void obtenerClientes(){
        Cursor cursor = clienteData.obtenerClientesActivos();
        while(cursor.moveToNext()){

            listaClientes.add(new Cliente(cursor.getInt(0),cursor.getString(1),cursor.getInt(2),cursor.getInt(3)));
            clientesString.add(cursor.getString(1));
        }
        ArrayAdapter<String> clientesAdapter = new ArrayAdapter<String>(getApplicationContext(), R.layout.simple_spinner_item, clientesString);
        clientesAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerClientes.setAdapter(clientesAdapter);


    }
    @Override
    public void onBackPressed() {

    }

}