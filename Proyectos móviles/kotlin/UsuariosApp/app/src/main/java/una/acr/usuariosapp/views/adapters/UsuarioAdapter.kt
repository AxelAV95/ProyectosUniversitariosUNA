package una.acr.usuariosapp.views.adapters

import android.content.Context
import android.content.Intent
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import android.widget.Toast
import androidx.activity.result.ActivityResultLauncher
import androidx.recyclerview.widget.RecyclerView
import com.airbnb.lottie.LottieAnimationView
import una.ac.cr.usuariosapp.domain.Usuario
import una.acr.usuariosapp.R
import una.acr.usuariosapp.network.VolleyUsuario
import una.acr.usuariosapp.views.activities.FormularioUsuarioActivity
import una.acr.usuariosapp.views.interfaces.UsuarioDeleteCallback

class UsuarioAdapter(private var lista: ArrayList<Usuario>, private var activityResultLauncher :
                     ActivityResultLauncher<Intent> , private var context : Context,
                     private val usuarioDeleteCallback: UsuarioDeleteCallback
) : RecyclerView.Adapter<UsuarioAdapter.ViewHolderUsuario>() {
    override fun onCreateViewHolder(
        parent: ViewGroup,
        viewType: Int
    ): UsuarioAdapter.ViewHolderUsuario {
        val v = LayoutInflater.from(parent.context).inflate(R.layout.item_recycler_usuario, parent, false)
        return ViewHolderUsuario(v)

    }




    override fun onBindViewHolder(holder: UsuarioAdapter.ViewHolderUsuario, position: Int) {

        val usuario = lista[position]
        holder.nombre.text = usuario.getNombreValue().toString()
        holder.correo.text = usuario.getCorreoValue().toString()

        holder.modificar.setOnClickListener {
            val intent = Intent(it.context, FormularioUsuarioActivity::class.java)
            intent.putExtra("metodo", "actualizar")
            intent.putExtra("id",usuario.getIdValue())
            intent.putExtra("nombre", usuario.getNombreValue())
            intent.putExtra("correo",usuario.getCorreoValue())
            intent.putExtra("password", usuario.getPasswordValue())
            intent.putExtra("tipo", usuario.getFechaValue())
            intent.putExtra("fecha",usuario.getTipoUsuarioValue())
            intent.putExtra("estado",usuario.getEstadoValue())
            activityResultLauncher.launch(intent)
            /*val intent = Intent(it.context, FormularioUsuarioActivity::class.java)
            intent.putExtra("tipo", "actualizar")
            intent.putExtra("cliente", c)
            it.context.startActivity(intent)
            (it.context as Activity).finish()*/
            // Toast.makeText(v.getContext(),String.valueOf(c.getTelefono()),Toast.LENGTH_SHORT).show();
        }

        holder.eliminar.setOnClickListener {
            val volleyUsuario = VolleyUsuario()
            volleyUsuario.eliminarUsuario(context,usuario,"", usuarioDeleteCallback)
            //usuarioDeleteCallback.onUsuarioDeleted()

            /*val intent = Intent(it.context, FavoritosActivity::class.java)
            intent.putExtra("cliente", c)
            it.context.startActivity(intent)*/
        }

        holder.ver.setOnClickListener {
            var estado = "";
            if(usuario.getEstadoValue() == 1){
                estado = "Activo"
            }else{
                estado = "Inactivo"
            }
            Toast.makeText(it.context, "Nombre: "+usuario.getNombreValue().toString()+"\nCorreo: "+usuario.getCorreoValue().toString()+"\nFecha: "+usuario.getFechaValue().toString()+"\nTipo: "+ usuario.getTipoUsuarioValue()+"\nEstado: "+estado, Toast.LENGTH_LONG).show();
        }

    }

    override fun getItemCount(): Int {
        return lista.size
    }

    fun setLista(lista: ArrayList<Usuario>) {
        this.lista = lista
        notifyDataSetChanged()
    }

    inner class ViewHolderUsuario(itemView: View) : RecyclerView.ViewHolder(itemView) {
        internal val nombre : TextView = itemView.findViewById(R.id.item_usuario_nombre)
        internal val correo : TextView = itemView.findViewById(R.id.item_usuario_correo)
        internal val modificar : LottieAnimationView = itemView.findViewById(R.id.item_boton_modificar)
        internal val eliminar : LottieAnimationView = itemView.findViewById(R.id.item_boton_eliminar)
        internal val ver : LottieAnimationView = itemView.findViewById(R.id.item_boton_ver)
    }
}