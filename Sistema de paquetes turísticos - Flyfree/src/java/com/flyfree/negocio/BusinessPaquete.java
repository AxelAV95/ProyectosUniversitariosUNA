/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.negocio;

import com.flyfree.datos.paqueteData;
import com.flyfree.dominio.Paquete;
import java.io.IOException;
import java.sql.SQLException;
import java.util.LinkedList;

/**
 *
 * @author andra
 */
public class BusinessPaquete {
    
   private paqueteData pd;
   
   public BusinessPaquete(){
       this.pd = new paqueteData();
   }
   
   public LinkedList<Paquete> getMostrarPaquetes() throws SQLException{
       return pd.getMostrarPaquete();
   }
   
   public boolean agregarPaquete(Paquete paq) throws SQLException, IOException{
       return pd.agregarPaquete(paq);
   
   }
    
}
