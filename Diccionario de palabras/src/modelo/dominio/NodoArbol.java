/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo.dominio;

import modelo.negocio.LogicaArbol;

/**
 *
 * @author adeve
 */
public class NodoArbol {

    private char letra;
    private int id;
   
    private boolean limite;
    private NodoArbol siguiente;
    private NodoArbol padre;
    private NodoArbol hijo;
    private NodoArbol hermano;
    
    public NodoArbol(){
        
    }
    
    public NodoArbol(char c, int id) {
        this.letra = c;
        this.id = id;
      
        //LogicaListaHijos llh = new LogicaListaHijos();
        //llh.agregarNodo(this.listaHijos, 0, '\0');
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

   

    public NodoArbol getSiguiente() {
        return siguiente;
    }

    public void setSiguiente(NodoArbol siguiente) {
        this.siguiente = siguiente;
    }

    public NodoArbol(char c, NodoArbol padre) {
        this.letra = c;
        this.padre = padre;
        this.hijo = this.hermano = null;

    }

    public boolean isLimite() {
        return limite;
    }

    public void setLimite(boolean limite) {
        this.limite = limite;
    }

    public NodoArbol(char c) {
        this.letra = c;
    }

    public char getLetra() {
        return letra;
    }

    public void setLetra(char letra) {
        this.letra = letra;
    }

    public NodoArbol getPadre() {
        return padre;
    }

    public void setPadre(NodoArbol padre) {
        this.padre = padre;
    }

    public NodoArbol getHijo() {
        return hijo;
    }

    public void setHijo(NodoArbol hijo) {
        this.hijo = hijo;
    }

    public NodoArbol getHermano() {
        return hermano;
    }

    public void setHermano(NodoArbol hermano) {
        this.hermano = hermano;
    }

}
