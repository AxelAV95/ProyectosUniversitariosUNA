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
public class Nodo {
    private char letra;
    private Nodo hijo;
    private Nodo hermano;
    private Nodo siguiente;
    private boolean limite;
    private boolean padre;
    
    public Nodo(){
         this.letra = '\0';
        this.hijo = null;
        this.hermano = null;
        this.limite = false;
        this.padre = false;
    }

    public Nodo getSiguiente() {
        return siguiente;
    }

    public void setSiguiente(Nodo siguiente) {
        this.siguiente = siguiente;
    }
    public Nodo(char c){
        this.letra = c;
        this.hijo = null;
        this.hermano = null;
        this.limite = false;
        this.padre = false;
    }

    public char getLetra() {
        return letra;
    }

    public void setLetra(char letra) {
        this.letra = letra;
    }

    public Nodo getHijo() {
        return hijo;
    }

    public void setHijo(Nodo hijo) {
        this.hijo = hijo;
    }

    public Nodo getHermano() {
        return hermano;
    }

    public void setHermano(Nodo hermano) {
        this.hermano = hermano;
    }

    public boolean isLimite() {
        return limite;
    }

    public void setLimite(boolean limite) {
        this.limite = limite;
    }

    public boolean isPadre() {
        return padre;
    }

    public void setPadre(boolean padre) {
        this.padre = padre;
    }
    
    
    
    
}
