package una.ac.cr.usuariosapp.domain

import java.io.Serializable

data class Usuario(
    private var id: Int,
    private var nombre: String,
    private var correo: String,
    private var password: String,
    private var fecha: String,
    private var tipoUsuario: String,
    private var estado: Int
) : Serializable {

    fun setId(newId: Int) {
        id = newId
    }

    fun getIdValue(): Int {
        return id
    }

    // Setter and Getter for nombre
    fun setNombre(newNombre: String) {
        nombre = newNombre
    }

    fun getNombreValue(): String {
        return nombre
    }

    // Setter and Getter for correo
    fun setCorreo(newCorreo: String) {
        correo = newCorreo
    }

    fun getCorreoValue(): String {
        return correo
    }

    // Setter and Getter for password
    fun setPassword(newPassword: String) {
        password = newPassword
    }

    fun getPasswordValue(): String {
        return password
    }

    // Setter and Getter for fecha
    fun setFecha(newFecha: String) {
        fecha = newFecha
    }

    fun getFechaValue(): String {
        return fecha
    }

    // Setter and Getter for tipoUsuario
    fun setTipoUsuario(newTipoUsuario: String) {
        tipoUsuario = newTipoUsuario
    }

    fun getTipoUsuarioValue(): String {
        return tipoUsuario
    }

    // Setter and Getter for estado
    fun setEstado(newEstado: Int) {
        estado = newEstado
    }

    fun getEstadoValue(): Int {
        return estado
    }
}
