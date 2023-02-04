/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.dominio;

/**
 *
 * @author adeve Lista simple
 */
public class ListaImagen {
    private NodoImagen primero;
    private NodoImagen ultimo;

   

    public ListaImagen() {
        this.primero = null;
        this.ultimo = null;
    }

    public NodoImagen getPrimero() {
        return primero;
    }

    public void setPrimero(NodoImagen primero) {
        this.primero = primero;
    }

    public NodoImagen getUltimo() {
        return ultimo;
    }

    public void setUltimo(NodoImagen ultimo) {
        this.ultimo = ultimo;
    }
    
    
    
}
