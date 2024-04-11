package una.acr.usuariosapp.views.activities

import android.content.Intent
import android.os.Build
import android.os.Bundle
import android.util.Log
import android.widget.ArrayAdapter
import android.widget.Button
import android.widget.CheckBox
import android.widget.EditText
import android.widget.Spinner
import android.widget.Toast
import androidx.annotation.RequiresApi
import com.google.android.material.snackbar.Snackbar
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.WindowCompat
import androidx.navigation.findNavController
import androidx.navigation.ui.AppBarConfiguration
import androidx.navigation.ui.navigateUp
import androidx.navigation.ui.setupActionBarWithNavController
import una.ac.cr.usuariosapp.domain.Usuario
import una.acr.usuariosapp.R
import una.acr.usuariosapp.databinding.ActivityFormularioUsuarioBinding
import una.acr.usuariosapp.network.VolleyUsuario

class FormularioUsuarioActivity : AppCompatActivity() {

    private lateinit var formUNombre: EditText
    private lateinit var formUCorreo: EditText
    private lateinit var formUPassword: EditText
    private lateinit var spinnerTipoUsuario: Spinner
    private lateinit var formUFecha: EditText
    private lateinit var formUCheckActivo: CheckBox
    private lateinit var btnMetodo: Button
    private lateinit var listaTipoUsuarioString: ArrayList<String>
    private lateinit var u : Usuario

    @RequiresApi(Build.VERSION_CODES.TIRAMISU)
    override fun onCreate(savedInstanceState: Bundle?) {
        WindowCompat.setDecorFitsSystemWindows(window, false)
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_formulario_usuario)
        listaTipoUsuarioString = ArrayList()
        formUNombre = findViewById(R.id.form_u_nombre)
        formUCorreo = findViewById(R.id.form_u_correo)
        formUPassword = findViewById(R.id.form_u_password)
        spinnerTipoUsuario = findViewById(R.id.spinner_tipo_usuario)
        formUFecha = findViewById(R.id.form_u_fecha)
        formUCheckActivo = findViewById(R.id.form_u_check_activo)
        formUCheckActivo.isEnabled = true
        btnMetodo = findViewById(R.id.btn_metodo)

     //   spinnerTipoUsuario.setSelection(0)
        listaTipoUsuarioString.add("Administrador");
        listaTipoUsuarioString.add("Empleado");


        val tipoUsuarioAdapter: ArrayAdapter<String> = ArrayAdapter(applicationContext, R.layout.simple_spinner_item, listaTipoUsuarioString)
        tipoUsuarioAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
        spinnerTipoUsuario.adapter = tipoUsuarioAdapter
        val intent: Intent = intent
        val id = intent.getIntExtra("id", 0)
        val nombre = intent.getStringExtra("nombre") ?: ""
        val correo = intent.getStringExtra("correo") ?: ""
        val password = intent.getStringExtra("password") ?: ""
        val fecha = intent.getStringExtra("fecha") ?: ""
        val tipoUsuario = intent.getStringExtra("tipo") ?: ""
        val estado = intent.getIntExtra("estado", 0)

        u = Usuario(
            id = id,
            nombre = nombre,
            correo = correo,
            password = password,
            fecha = fecha,
            tipoUsuario = tipoUsuario,
            estado = estado
        )


        if (intent.extras?.getString("metodo") == "agregar") {
            btnMetodo.text = "Agregar"
            formUCheckActivo.isChecked = true
        } else if (intent.extras?.getString("metodo") == "actualizar") {

            btnMetodo.text = "Actualizar"
            if (u != null) {
                formUNombre.setText(u.getNombreValue())
                formUCorreo.setText(u.getCorreoValue())
                formUFecha.setText(u.getFechaValue())
                formUPassword.setText(u.getPasswordValue())
              //  Log.e("CHECK", u.getFechaValue())
                Log.e("CHECKt", u.getTipoUsuarioValue())

                val selectedIndex = listaTipoUsuarioString.indexOf(u.getTipoUsuarioValue())
                Log.e("CHECK", selectedIndex.toString())
                if (selectedIndex != -1) {
                    spinnerTipoUsuario.setSelection(selectedIndex)
                }
                formUCheckActivo.isChecked = u.getEstadoValue() == 1
            }
        }



        btnMetodo.setOnClickListener {
            val nombre = formUNombre.text.toString().trim()
            val correo = formUCorreo.text.toString().trim()
            val password = formUPassword.text.toString().trim()
            val tipoUsuario = spinnerTipoUsuario.selectedItem.toString()
            val fecha = formUFecha.text.toString().trim()
            val isActivo = formUCheckActivo.isChecked
            var estadoU = 0

            if(formUCheckActivo.isChecked){
                estadoU = 1
            }

            if (nombre.isEmpty()) {
                formUNombre.error = "Se requiere nombre"
                formUNombre.requestFocus()
                return@setOnClickListener
            } else if (!nombre.matches("[a-zA-Z ]+".toRegex())) {
                formUNombre.error = "El nombre solo debe contener letras"
                formUNombre.requestFocus()
                return@setOnClickListener
            } else if (correo.isEmpty()) {
                formUCorreo.error = "Se requiere correo"
                formUCorreo.requestFocus()
                return@setOnClickListener
            } else if (!android.util.Patterns.EMAIL_ADDRESS.matcher(correo).matches()) {
                formUCorreo.error = "Correo inválido"
                formUCorreo.requestFocus()
                return@setOnClickListener
            } else if (password.isEmpty()) {
                formUPassword.error = "Se requiere contraseña"
                formUPassword.requestFocus()
                return@setOnClickListener
            } else if (tipoUsuario.isEmpty()) {
                spinnerTipoUsuario.requestFocus()
                Toast.makeText(this, "Debe ingresar un tipo de usuario", Toast.LENGTH_LONG).show()
                return@setOnClickListener
            } else if (fecha.isEmpty()) {
                formUFecha.error = "Debe seleccionar una fecha"
                formUFecha.requestFocus()
                return@setOnClickListener
            } else if (!fecha.matches("\\d{2}-\\d{2}-\\d{4}".toRegex())) {
                formUFecha.error = "Formato de fecha inválido (DD-MM-AAAA)"
                formUFecha.requestFocus()
                return@setOnClickListener
            }/* else if (!isActivo && intent.extras?.getString("metodo") == "agregar") {
                formUCheckActivo.error = "Debe seleccionar el estado"
                formUCheckActivo.requestFocus()
                Toast.makeText(this, "Debe seleccionar el estado", Toast.LENGTH_LONG).show()
                return@setOnClickListener
            } */else {

                if (intent.extras?.getString("metodo") == "agregar"){
                    val usuario = Usuario(
                        id = 0, // You can set the initial value of id as per your requirements
                        nombre = nombre,
                        correo = correo,
                        password = password,
                        fecha = fecha,
                        tipoUsuario = tipoUsuario,
                        estado = estadoU
                    )
                    val volleyUsuario = VolleyUsuario()
                    volleyUsuario.insertarUsuario(
                        this@FormularioUsuarioActivity,
                        usuario,
                        ""
                    )


                }else if (intent.extras?.getString("metodo") == "actualizar"){
                    val usuario = Usuario(
                        id = u.getIdValue(),
                        nombre = nombre,
                        correo = correo,
                        password = password,
                        fecha = fecha,
                        tipoUsuario = tipoUsuario,
                        estado = estadoU
                    )
                    Log.e("USUARIOTEST",usuario.toString())
                    val volleyUsuario = VolleyUsuario()
                    volleyUsuario.actualizarUsuario(
                        this@FormularioUsuarioActivity,
                        usuario,
                        ""
                    )
                }

            }



        }



    }


}