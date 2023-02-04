/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo.dominio;

/**
 *
 * @author adeve
 */
public class ListaPrincipal {
    private NodoPrincipal primero;
    private NodoPrincipal ultimo;
    
    public ListaPrincipal(){
        this.primero = null;
        this.ultimo = null;
    }

    public NodoPrincipal getPrimero() {
        return primero;
    }

    public void setPrimero(NodoPrincipal primero) {
        this.primero = primero;
    }

    public NodoPrincipal getUltimo() {
        return ultimo;
    }

    public void setUltimo(NodoPrincipal ultimo) {
        this.ultimo = ultimo;
    }
    
    
}
    

