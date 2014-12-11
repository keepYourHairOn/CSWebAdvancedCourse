using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace web_browser1
{
    public partial class Form1 : Form
    {
        // \brief class which creates the look and functionality of the wpf
        /*!
         * Class which initialize all components of the wpf and initialise events for it.
         * Initialise component (Form in itself)
        */
        public Form1()
        {
            InitializeComponent();
        }
        //!Event(navigation) that will be prosessed on button click
        private void gpButton_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate(new Uri(comboBox1.SelectedItem.ToString()));
        }

        //!Event(home page opening) that will be prosessed on button click
        private void homePageToolStripMenuItem_Click(object sender, EventArgs e)
        {
            webBrowser1.GoHome();
        }
        //!Event(go back) that will be prosessed on button click
        private void backToolStripMenuItem_Click(object sender, EventArgs e)
        {
            webBrowser1.GoBack();
        }
        //!Event(choose item from the dropdown menu) that will be prosessed on click
        private void nextToolStripMenuItem_Click(object sender, EventArgs e)
        {
            webBrowser1.GoForward();
        }
        //!Event(loading of the item choosen from the menu) that will be prosessed on click
        private void Form1_Load(object sender, EventArgs e)
        {
            comboBox1.SelectedIndex = 0;
            webBrowser1.GoHome();
        }

    }
}
