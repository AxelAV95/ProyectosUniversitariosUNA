package una.acr.appexamenaxel.view.activities;

import androidx.activity.result.ActivityResult;
import androidx.activity.result.ActivityResultCallback;
import androidx.activity.result.ActivityResultLauncher;
import androidx.activity.result.contract.ActivityResultContracts;
import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.Matrix;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.IOException;

import es.dmoral.toasty.Toasty;
import una.acr.appexamenaxel.R;
import una.acr.appexamenaxel.network.VolleySingleton;
import una.acr.appexamenaxel.utils.NetworkUtils;

public class FormularioProductoActivity extends AppCompatActivity {

    private EditText campoNombre, campoCantidad, campoDetalles;
    private Button btnSeleccionarImagen, btnAgregarProducto, btnRegresar;
    private ImageView imagenProducto;

    private Bitmap bitmap;

    private Boolean imgSeleccionada;

    ActivityResultLauncher<Intent> imagenLauncher = registerForActivityResult(
            new ActivityResultContracts.StartActivityForResult(),
            new ActivityResultCallback<ActivityResult>() {
                @Override
                public void onActivityResult(ActivityResult result) {

                    if (result.getResultCode() == Activity.RESULT_OK) {
                        Intent data = result.getData();

                        if (data != null) {
                            Uri ruta = data.getData();
                            imagenProducto.setImageURI(ruta);

                            try {
                                bitmap = MediaStore.Images.Media.getBitmap(getApplicationContext().getContentResolver(), ruta);
                                imagenProducto.setImageBitmap(bitmap);
                            } catch (IOException e) {
                                e.printStackTrace();
                            }
                            imgSeleccionada = true;
                            bitmap = redimensionarImagen(bitmap, 600, 800);

                        } else {
                            imgSeleccionada = false;
                        }
                    }


                }
            });


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_formulario_producto);


        campoNombre = findViewById(R.id.producto_campo_nombre);
        campoCantidad = findViewById(R.id.producto_campo_cantidad);
        campoDetalles = findViewById(R.id.producto_campo_detalles);
        btnSeleccionarImagen = findViewById(R.id.btn_seleccionar_imagen);
        btnAgregarProducto = findViewById(R.id.btn_form_agregar_producto);
        btnRegresar = findViewById(R.id.btn_regresar);
        imagenProducto = findViewById(R.id.producto_imagen);
        imgSeleccionada = false;

        btnSeleccionarImagen.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Intent.ACTION_GET_CONTENT);
                intent.setType("image/*");
                imagenLauncher.launch(Intent.createChooser(intent, "Seleccione una imagen"));
            }
        });

        btnRegresar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(FormularioProductoActivity.this, MainActivity.class);
                startActivity(intent);
                finish();
            }
        });

        btnAgregarProducto.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                if (campoNombre.getText().toString().equals("")) {
                    campoNombre.requestFocus();
                    Toasty.info(getApplicationContext(), "Debe ingresar el nombre", Toast.LENGTH_SHORT, true).show();
                    //Toast.makeText(getApplicationContext(),"Debe ingresar el nombre",Toast.LENGTH_SHORT).show();
                } else if(campoCantidad.getText().toString().equals("")){
                    campoCantidad.requestFocus();
                    Toasty.info(getApplicationContext(), "Debe ingresar una cantidad", Toast.LENGTH_SHORT, true).show();
                  //  Toast.makeText(getApplicationContext(),"Debe ingresar una cantidad",Toast.LENGTH_SHORT).show();
                } else if(campoDetalles.getText().toString().equals("")){
                    campoDetalles.requestFocus();
                    Toasty.info(getApplicationContext(), "Debe ingresar detalles del producto", Toast.LENGTH_SHORT, true).show();
                    //Toast.makeText(getApplicationContext(),"Debe ingresar detalles del producto",Toast.LENGTH_SHORT).show();
                } else if(!imgSeleccionada){
                    Toasty.info(getApplicationContext(), "Debe ingresar una imagen", Toast.LENGTH_SHORT, true).show();
                    //Toast.makeText(getApplicationContext(),"Debe ingresar una imagen",Toast.LENGTH_SHORT).show();
                } else {
                    enviarServer();
                }

            }
        });

    }

    private Bitmap redimensionarImagen(Bitmap bitmap, float anchoNuevo, float altoNuevo) {

        int ancho=bitmap.getWidth();
        int alto=bitmap.getHeight();

        if(ancho>anchoNuevo || alto>altoNuevo){
            float escalaAncho=anchoNuevo/ancho;
            float escalaAlto= altoNuevo/alto;

            Matrix matrix=new Matrix();
            matrix.postScale(escalaAncho,escalaAlto);

            return Bitmap.createBitmap(bitmap,0,0,ancho,alto,matrix,false);

        }else{
            return bitmap;
        }
    }

    public void enviarServer(){

        JSONObject productoJson = new JSONObject();
        try {
            productoJson.put("metodo", "insertar");
            productoJson.put("nombre", campoNombre.getText().toString());
            productoJson.put("cantidad", campoCantidad.getText().toString());
            productoJson.put("detalles", campoDetalles.getText().toString());
            productoJson.put("imagen", convertirImgString(bitmap));



        } catch (JSONException e) {
            throw new RuntimeException(e);
        }

        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(Request.Method.POST, NetworkUtils.HTTP+NetworkUtils.IP+NetworkUtils.RUTA_PRODUCTO,  productoJson , new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {

                if(response.optString("statusCode").toString().equals("200")){

                    Toasty.success(getApplicationContext(), "Agregado con éxito", Toast.LENGTH_SHORT, true).show();
                   // Toast.makeText(getApplicationContext(),"Agregado con éxito",Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(FormularioProductoActivity.this, MainActivity.class);
                    startActivity(intent);
                    finish();

                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("anyText",error.toString());
                Toasty.error(getApplicationContext(), "Error al agregar", Toast.LENGTH_SHORT, true).show();
             //   Toast.makeText(getApplicationContext(),"Error al agregar",Toast.LENGTH_SHORT).show();
            }
        });

        VolleySingleton.getVolleySingleton(getApplicationContext()).addToRequestQueue(jsonObjectRequest);
    }

    private String convertirImgString(Bitmap bitmap) {

        ByteArrayOutputStream array=new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.JPEG,100,array);
        byte[] imagenByte=array.toByteArray();
        String imagenString= Base64.encodeToString(imagenByte, Base64.DEFAULT);

        return imagenString;
    }

    @Override
    public void onBackPressed() {

    }



}