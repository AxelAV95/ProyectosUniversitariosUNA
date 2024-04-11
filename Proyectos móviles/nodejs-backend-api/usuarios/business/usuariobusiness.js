const UsuarioData = require('../data/usuariodata');

require('../data/usuariodata');

class UsuarioBusiness {
    constructor() {
        this.usuarioData = new UsuarioData();
    }

    async insertarUsuario(usuario){
        return await this.usuarioData.insertarUsuario(usuario);
    }

    async modificarUsuario(usuario){
        return await this.usuarioData.actualizarUsuario(usuario);
    }

    async eliminarUsuario(usuarioid){
        return await this.usuarioData.eliminarUsuario(usuarioid);
    }

    async obtenerUsuarios(){
        return await this.usuarioData.obtenerUsuarios();
    }

    async obtenerDatosUsuario(usuarioid){
        return await this.usuarioData.obtenerDatosUsuario(usuarioid);
    }
}

module.exports = UsuarioBusiness;