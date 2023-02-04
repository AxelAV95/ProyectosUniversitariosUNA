/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.action;

import com.flyfree.dominio.Destinos;
import com.flyfree.dominio.Paquete;
import com.flyfree.negocio.BusinessPaquete;
import java.util.LinkedList;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;

import org.apache.struts.actions.DispatchAction;
import org.apache.struts.action.ActionForm;
import org.apache.struts.action.ActionMapping;
import org.apache.struts.action.ActionForward;

/**
 *
 * @author andra
 */
@WebServlet("/paqueteAction")
@MultipartConfig(maxFileSize = 16177216)
public class paqueteAction extends DispatchAction {

    /* forward name="success" path="" */
    private final static String SUCCESS = "success";

    /**
     * This is the Struts action method called on
     * http://.../actionPath?method=myAction1, where "method" is the value
     * specified in <action> element : ( <action parameter="method" .../> )
     */
    public ActionForward mostrarPaquetes(ActionMapping mapping, ActionForm form,
            HttpServletRequest request, HttpServletResponse response)
            throws Exception {
        
        BusinessPaquete bp = new BusinessPaquete();
        LinkedList<Paquete> listaPaquetes = bp.getMostrarPaquetes();
        
        boolean bandera = false;
        boolean obtuvo;
        obtuvo = !listaPaquetes.isEmpty();
        
        if(obtuvo){
            request.setAttribute("Paquetes", listaPaquetes);
             return mapping.findForward("ListaPaquetes");
        }else{
            return mapping.findForward("welcome");
        }
        
        
       
    }

    /**
     * This is the Struts action method called on
     * http://.../actionPath?method=myAction2, where "method" is the value
     * specified in <action> element : ( <action parameter="method" .../> )
     */
    public ActionForward mostrarPaquetesDisponibles(ActionMapping mapping, ActionForm form,
            HttpServletRequest request, HttpServletResponse response)
            throws Exception {
        
         BusinessPaquete bp = new BusinessPaquete();
        LinkedList<Paquete> listaPaquetes = bp.getMostrarPaquetes();
        
        boolean bandera = false;
        boolean obtuvo;
        obtuvo = !listaPaquetes.isEmpty();
        
        if(obtuvo){
            request.setAttribute("lista", listaPaquetes);
             return mapping.findForward("ListaDisponibles");
        }else{
            return mapping.findForward("welcome");
        }
    }
    
    public ActionForward agregarPaquete(ActionMapping mapping, ActionForm form,
            HttpServletRequest request, HttpServletResponse response)
            throws Exception {
        BusinessPaquete bp = new BusinessPaquete();
        
         boolean insertar = false;   
        String url;
        
        
        //int idDestino = Integer.parseInt(request.getParameter("idDestino"));
        //int idServicio = Integer.parseInt(request.getParameter("idServicio"));
        //int precio = Integer.parseInt(request.getParameter("precio"));
        //int dias = Integer.parseInt(request.getParameter("dias"));
        //int cantidad = Integer.parseInt(request.getParameter("cantidad"));
        String fecha = request.getParameter("fecha");
        String descripcion = request.getParameter("descripcion");
        Part part = request.getPart("image");
         
        //Paquete paq =  new Paquete( new Destinos(idDestino),idServicio,precio,dias,cantidad,fecha,descripcion,part);
        Paquete paq =  new Paquete( new Destinos(4),1,100,2,2,fecha,descripcion,part);
        insertar = bp.agregarPaquete(paq);
        
        if(insertar){
            
             return mapping.findForward("agregado");
        }else{
            return mapping.findForward("welcome");
        }
        
        
    }
    
      public ActionForward myAction3(ActionMapping mapping, ActionForm form,
            HttpServletRequest request, HttpServletResponse response)
            throws Exception {
        
        return mapping.findForward(SUCCESS);
    }
}
