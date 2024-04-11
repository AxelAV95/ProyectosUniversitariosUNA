package una.acr.usuariosapp.views.interfaces

import una.ac.cr.usuariosapp.domain.Usuario

interface UsuarioICallback {
    fun onUsuarioReceived(listaUsuarios: ArrayList<Usuario>)
}