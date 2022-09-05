/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.mavenproject2;

import java.sql.Connection;
import java.sql.DriverManager;
import javax.swing.JOptionPane;

/**
 *
 * @author Ricardo Ranauro
 */
public class NewClass {
    Connection conectar =null;
    
    public  Connection estableceConexion()  {
        try {
           Class.forName("com.mysql.jdbc.Driver");
           conectar=DriverManager.getConnection("jdbc:mysql://localhost:3306/datosgps","ricardo","ricardorobot22");
           JOptionPane.showMessageDialog(null," se conectó correctamente a la base de datos");
        
        } catch(Exception e){
           JOptionPane.showMessageDialog(null,"No se conectó a la base de datos, error :"+ e.toString()); 
        }
        
      return conectar;  
}
    }
