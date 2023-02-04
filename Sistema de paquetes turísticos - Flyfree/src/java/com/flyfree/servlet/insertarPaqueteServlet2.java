/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.servlet;

import com.flyfree.datos.paqueteData;
import com.flyfree.dominio.Destinos;
import com.flyfree.dominio.Paquete;
import com.flyfree.negocio.BusinessPaquete;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;
import javax.swing.JOptionPane;

/**
 *
 * @author andra
 */
@WebServlet(name = "insertarPaqueteServlet2", urlPatterns = {"/insertarPaquete"})
@MultipartConfig(maxFileSize = 16177216)
public class insertarPaqueteServlet2 extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
          BusinessPaquete bp = new BusinessPaquete();
       Paquete p = new Paquete();
       boolean inserto = false;
       //JOptionPane.showMessageDialog(null,request.getParameter("servicioid") );
       String destinoid = request.getParameter("iddestino");
       Destinos d = new Destinos();
       d.setDestinonombre(destinoid);
       String desc = request.getParameter("descripcion");
       int cant  = Integer.parseInt(request.getParameter("cantidad"));
       String fecha = request.getParameter("fecha");
       int dias = Integer.parseInt(request.getParameter("dias"));
       double precio = Double.parseDouble(request.getParameter("precio"));
       String idserv = request.getParameter("servicioid");
       Part part = request.getPart("image");
       paqueteData pd = new paqueteData();
       
       p.setIdDestino(d);
       p.setDescripcion(desc);
       p.setCantidad(cant);
       p.setFecha(fecha);
       p.setDias(dias);
       p.setPrecio(precio);
       p.setServicioNombre(idserv);
       p.setImagen(part);
       JOptionPane.showMessageDialog(null,p.getServicioNombre());
       
       /*  JOptionPane.showMessageDialog(null,p.getCantidad() );
        JOptionPane.showMessageDialog(null,p.getDescripcion() );
        JOptionPane.showMessageDialog(null,p.getDias() );
        JOptionPane.showMessageDialog(null,p.getFecha() );
        JOptionPane.showMessageDialog(null,p.getIdDestino().getDestinonombre() );
        JOptionPane.showMessageDialog(null,p.getServicioNombre() );
        JOptionPane.showMessageDialog(null,p.getImagen() );
        JOptionPane.showMessageDialog(null,p.getPrecio() );*/
       
       String url ="";
        try {
            inserto = bp.agregarPaquete(p);
        } catch (SQLException ex) {
            Logger.getLogger(insertarPaqueteServlet2.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        if (inserto) {
            url = "exito.jsp";
        } else {
            url = "error.jsp";
        }
        
        
        
        RequestDispatcher despachador = request.getRequestDispatcher(url);
        despachador.forward(request, response);
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
