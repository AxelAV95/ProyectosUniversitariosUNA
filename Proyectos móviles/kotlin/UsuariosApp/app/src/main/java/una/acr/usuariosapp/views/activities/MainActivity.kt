package una.acr.usuariosapp.views.activities

import android.app.Activity
import android.content.Intent
import android.os.Bundle
import android.widget.Toast
import androidx.activity.result.contract.ActivityResultContracts
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.WindowCompat
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.airbnb.lottie.LottieAnimationView
import una.ac.cr.usuariosapp.domain.Usuario
import una.acr.usuariosapp.R
import una.acr.usuariosapp.network.VolleyUsuario
import una.acr.usuariosapp.views.adapters.UsuarioAdapter
import una.acr.usuariosapp.views.interfaces.UsuarioDeleteCallback
import una.acr.usuariosapp.views.interfaces.UsuarioICallback
import java.util.jar.Attributes

class MainActivity : AppCompatActivity() , UsuarioDeleteCallback {
    private lateinit var btnAgregar : LottieAnimationView;
    private lateinit var recyclerUsuarios : RecyclerView;
    private var listaUsuarios: ArrayList<Usuario> = ArrayList()
    private lateinit var usuarioAdapter: UsuarioAdapter


    internal val launcher =
        registerForActivityResult(ActivityResultContracts.StartActivityForResult()) { result ->
            if (result.resultCode == Activity.RESULT_OK) {
                Toast.makeText(this, "Agregado con éxito", Toast.LENGTH_LONG).show()
               actualizarLista()
            } else if (result.resultCode == 200) {

                Toast.makeText(this, "Actualizado con éxito", Toast.LENGTH_LONG).show()
                actualizarLista()
            } else if (result.resultCode == 400) {

                Toast.makeText(this, "Error al actualizar", Toast.LENGTH_LONG).show()

            }
        }

    override fun onCreate(savedInstanceState: Bundle?) {
        WindowCompat.setDecorFitsSystemWindows(window, false)
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

       // listaUsuarios.add(Usuario(1,"Axel","siuu","22","33","2",1))




        btnAgregar = findViewById(R.id.btn_agregar_usuario)


        btnAgregar.setOnClickListener {
            val intent = Intent(this, FormularioUsuarioActivity::class.java)
            intent.putExtra("metodo", "agregar")
            launcher.launch(intent)
        }

        recyclerUsuarios = findViewById(R.id.recyclerv_usuarios)
        recyclerUsuarios.layoutManager = LinearLayoutManager(this, RecyclerView.VERTICAL, false)

        val volleyUsuario = VolleyUsuario()
        val listener = object : UsuarioICallback {
            override fun onUsuarioReceived(lista: ArrayList<Usuario>) {
                listaUsuarios = lista
                usuarioAdapter.setLista(listaUsuarios)


            }
        }

        volleyUsuario.obtenerUsuarios(
            this,
            "",
            listener
        )

        usuarioAdapter = UsuarioAdapter( listaUsuarios, launcher, applicationContext,this)
        recyclerUsuarios.adapter = usuarioAdapter
    }

    private fun actualizarLista() {
        val volleyUsuario = VolleyUsuario()

        val listener = object : UsuarioICallback {
            override fun onUsuarioReceived(lista: ArrayList<Usuario>) {
                listaUsuarios.clear()
                listaUsuarios.addAll(lista)
                usuarioAdapter.notifyDataSetChanged()
            }
        }

        volleyUsuario.obtenerUsuarios(this, "", listener)
    }

    override fun onUsuarioDeleted() {
        actualizarLista()
    }

}