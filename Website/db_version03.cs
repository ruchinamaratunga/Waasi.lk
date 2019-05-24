using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Newmvc
{
    #region Customer
    public class Customer
    {
        #region Member Variables
        protected int _id;
        protected string _username;
        protected string _password;
        protected string _fname;
        protected string _lname;
        protected string _email;
        protected bool _deleted;
        #endregion
        #region Constructors
        public Customer() { }
        public Customer(string username, string password, string fname, string lname, string email, bool deleted)
        {
            this._username=username;
            this._password=password;
            this._fname=fname;
            this._lname=lname;
            this._email=email;
            this._deleted=deleted;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual string Fname
        {
            get {return _fname;}
            set {_fname=value;}
        }
        public virtual string Lname
        {
            get {return _lname;}
            set {_lname=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual bool Deleted
        {
            get {return _deleted;}
            set {_deleted=value;}
        }
        #endregion
    }
    #endregion
}