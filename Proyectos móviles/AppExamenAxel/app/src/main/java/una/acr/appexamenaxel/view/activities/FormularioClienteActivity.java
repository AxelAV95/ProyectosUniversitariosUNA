package una.acr.appexamenaxel.view.activities;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Toast;

import es.dmoral.toasty.Toasty;
import una.acr.appexamenaxel.R;
import una.acr.appexamenaxel.data.ClienteData;
import una.acr.appexamenaxel.domain.Cliente;

public class FormularioClienteActivity extends AppCompatActivity {

    private EditText campoNombre, campoTelefono;
    private CheckBox checkActivo;
    private Button btnAgregarCliente, btnRegresar;
    private ClienteData clienteData;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_formulario_cliente);

        clienteData = new ClienteData(this);
        campoNombre = findViewById(R.id.cliente_campo_nombre);
        campoTelefono = findViewById(R.id.cliente_campo_telefono);
        checkActivo = findViewById(R.id.cliente_check_activo);
        btnRegresar = findViewById(R.id.btn_form_regresar);
        btnAgregarCliente = findViewById(R.id.btn_form_agregar_cliente);

        Intent intent = getIntent();
      //  int telefono = intent.getIntExtra("telefono");
        //Toast.makeText(getApplicationContext(),telefono,Toast.LENGTH_SHORT).show();

        if(intent.getStringExtra("tipo").equals("insertar")){
            btnAgregarCliente.setText("Agregar");
        } else if (intent.getStringExtra("tipo").equals("actualizar")) {
            btnAgregarCliente.setText("Actualizar");
            Cliente c = (Cliente)  getIntent().getSerializableExtra("cliente");

            campoNombre.setEnabled(false);
            campoNombre.setText(c.getNombre());
            campoTelefono.setText(String.valueOf(c.getTelefono()));
            if(c.getActivo() == 1){
                checkActivo.setChecked(true);
            }else{
                checkActivo.setChecked(false);
            }
           /*


            if(intent.getStringExtra("activo").equals(1)){
                checkActivo.setChecked(true);
            }else{
               checkActivo.setChecked(true);
            }*/
        }


        btnAgregarCliente.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                if(campoNombre.getText().toString().equals("")){
                    campoNombre.requestFocus();
                    Toasty.info(getApplicationContext(), "Debe ingresar el nombre", Toast.LENGTH_SHORT, true).show();
                 //   Toast.makeText(getApplicationContext(),"Debe ingresar el nombre",Toast.LENGTH_SHORT).show();
                }else if(campoTelefono.getText().toString().equals("")){
                    campoTelefono.requestFocus();
                    Toasty.info(getApplicationContext(), "Debe ingresar el telefono", Toast.LENGTH_SHORT, true).show();
                    //Toast.makeText(getApplicationContext(),"Debe ingresar el telefono",Toast.LENGTH_SHORT).show();
                }else{


                    if(intent.getExtras().getString("tipo").equals("insertar")){
                        Cliente c = new Cliente();
                        c.setNombre(campoNombre.getText().toString());
                        c.setTelefono(Integer.parseInt(campoTelefono.getText().toString()));
                        if(checkActivo.isChecked()){
                            c.setActivo(1);
                        }else{
                            c.setActivo(0);
                        }
                        if(clienteData.insertarCliente(c) == -1){
                            Toasty.error(getApplicationContext(), "Error al agregar", Toast.LENGTH_SHORT, true).show();
                            //Toast.makeText(getApplicationContext(),"Error al agregar",Toast.LENGTH_SHORT).show();
                        }else{
                            Toasty.success(getApplicationContext(), "Agregado con éxito", Toast.LENGTH_SHORT, true).show();
                            Intent intent = new Intent(FormularioClienteActivity.this, MainActivity.class);
                            startActivity(intent);

                            // Toast.makeText(getApplicationContext(),"Agregado con éxito",Toast.LENGTH_SHORT).show();
                            finish();
                        }
                    }else if(intent.getExtras().getString("tipo").equals("actualizar")){
                        Cliente anterior = (Cliente)  getIntent().getSerializableExtra("cliente");

                        Cliente actualizado = new Cliente();
                        actualizado.setId(anterior.getId());
                        actualizado.setNombre(anterior.getNombre());
                        actualizado.setTelefono(Integer.parseInt(campoTelefono.getText().toString()));
                        if(checkActivo.isChecked()){
                            actualizado.setActivo(1);
                        }else{
                            actualizado.setActivo(0);
                        }

                        //actualizar
                        if(clienteData.actualizarCliente(actualizado) == 0){
                            Toasty.error(getApplicationContext(), "Error al actualizar", Toast.LENGTH_SHORT, true).show();
                            //Toast.makeText(getApplicationContext(),"Error al actualizar",Toast.LENGTH_SHORT).show();
                        }else{
                            Intent intent = new Intent(FormularioClienteActivity.this, MainActivity.class);
                            startActivity(intent);
                            Toasty.success(getApplicationContext(), "Actualizado con éxito", Toast.LENGTH_SHORT, true).show();
                            //Toast.makeText(getApplicationContext(),"Actualizado con éxito",Toast.LENGTH_SHORT).show();
                            finish();
                        }
                    }

                }
            }
        });

        btnRegresar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(FormularioClienteActivity.this, MainActivity.class);
                startActivity(intent);
                finish();
            }
        });
    }

    @Override
    public void onBackPressed() {

    }
}