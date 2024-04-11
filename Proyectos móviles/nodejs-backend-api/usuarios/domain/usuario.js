class Usuario {
    constructor(usuarioid, usuarionombre, usuariocorreo, usuariopassword, usuariotipo, usuariofecharegistro, usuarioestado) {
      this.usuarioid = usuarioid;
      this.usuarionombre = usuarionombre;
      this.usuariocorreo = usuariocorreo;
      this.usuariopassword = usuariopassword;
      this.usuariotipo = usuariotipo;
      this.usuariofecharegistro = usuariofecharegistro;
      this.usuarioestado = usuarioestado;
    }
  
    getUsuarioid() {
      return this.usuarioid;
    }
  
    getUsuarionombre() {
      return this.usuarionombre;
    }
  
    getUsuariocorreo() {
      return this.usuariocorreo;
    }
  
    getUsuariopassword() {
      return this.usuariopassword;
    }
  
    getUsuariotipo() {
      return this.usuariotipo;
    }
  
    getUsuariofecharegistro() {
      return this.usuariofecharegistro;
    }
  
    getUsuarioestado() {
      return this.usuarioestado;
    }
  }

  module.exports = Usuario;