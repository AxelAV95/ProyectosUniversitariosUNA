package una.acr.appexamenaxel.view.activities;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.database.Cursor;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.airbnb.lottie.LottieAnimationView;

import java.util.ArrayList;

import es.dmoral.toasty.Toasty;
import una.acr.appexamenaxel.R;
import una.acr.appexamenaxel.domain.Cliente;
import una.acr.appexamenaxel.data.ClienteData;
import una.acr.appexamenaxel.view.adapters.ClienteAdapter;

public class MainActivity extends AppCompatActivity {

    private ClienteData clienteData;
    private RecyclerView recyclerClientes;
    private ClienteAdapter clienteAdapter;
    private ArrayList<Cliente> listaClientes;

    private Button btnAgregarCliente;
    private Button btnAgregarProducto, btnVincularProducto;

    private LottieAnimationView clientes, productos, favoritos;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        clienteData = new ClienteData(this);
        setContentView(R.layout.activity_main);
        clientes = findViewById(R.id.btn_agregar_cliente);
        productos = findViewById(R.id.btn_agregar_producto);
        favoritos = findViewById(R.id.btn_vincular_producto);



        listaClientes = new ArrayList<>();
        clienteAdapter = new ClienteAdapter(listaClientes);
        recyclerClientes = findViewById(R.id.recycler_clientes);
        recyclerClientes.setLayoutManager(new LinearLayoutManager(this,RecyclerView.VERTICAL,false));
        recyclerClientes.setAdapter(clienteAdapter);
        actualizarLista();


        productos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this,FormularioProductoActivity.class);
                startActivity(intent);
                finish();
            }
        });

        clientes.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this,FormularioClienteActivity.class);
                intent.putExtra("tipo","insertar");
                startActivity(intent);
                finish();
            }
        });

        favoritos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, VincularFavoritosActivity.class);
                startActivity(intent);
                finish();
            }
        });

        if(clienteAdapter.getItemCount()<=0){
            Toasty.info(getApplicationContext(), "No existen clientes registrados", Toast.LENGTH_LONG, true).show();
            //Toast.makeText(getApplicationContext(),"No existen clientes registrados",Toast.LENGTH_SHORT).show();
        }

        //clienteData.insertarCliente(new Cliente("Test",88888888,0));
    }

    private void actualizarLista() {
        Cursor cursor = clienteData.obtenerClientes();
        listaClientes.clear();
        if(clienteAdapter == null){
            return;
        }else{
            if(cursor == null){
                return ;
            }else{
                while(cursor.moveToNext()){
                    listaClientes.add(new Cliente(cursor.getInt(0),cursor.getString(1),cursor.getInt(2),cursor.getInt(3)));
                }
            }

            cursor.close();

        }

        clienteAdapter.setLista(listaClientes);
        clienteAdapter.notifyDataSetChanged();
    }
}