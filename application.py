from cs50 import SQL
from flask import Flask, flash, redirect, render_template, request, session, url_for
from flask_session import Session
from tempfile import mkdtemp

from helpers import apology, login_required, lookup, usd

# Configure application
app = Flask(__name__)
# Ensure responses aren't cached


@app.after_request
def after_request(response):
    response.headers["Cache-Control"] = "no-cache, no-store, must-revalidate"
    response.headers["Expires"] = 0
    response.headers["Pragma"] = "no-cache"
    return response


# Custom filter
app.jinja_env.filters["usd"] = usd

# Configure session to use filesystem (instead of signed cookies)
app.config["SESSION_FILE_DIR"] = mkdtemp()
app.config["SESSION_PERMANENT"] = False
app.config["SESSION_TYPE"] = "filesystem"
Session(app)

# Configure to use SQLite database
db = SQL("sqlite:///booking.db")


@app.route("/")
@login_required
def index():
    """Show portfolio of stocks"""
    pricelist_temp = db.execute("SELECT station1, station2 FROM pricelist WHERE id= :id", id=session["user_id"])
    # create TOTAL(cash+tickets) variable for later use
    totalcash = 0
    # update stock that user bought and total cash
    for i in pricelist:
        station1 = i["station"]
        NoOfTickets = i["tickets"]
        station2 = i["station"]
        totalcash += total
        db.execute("UPDATE pricelist_temp SET price=:price, total= :total WHERE id= :id AND symbol= :symbol",\
                    price=usd(stock["price"]),
                    total=usd(total),
                    id=session["user_id"])

    # update user's cash in portfolio
    updatedcash = db.execute("SELECT cash FROM users WHERE id= :id", id=session["user_id"])

    # calculate total asset
    totalcash += updatedcash[0]["cash"]
    # update portfolio
    updatedpricelist = db.execute("SELECT * from pricelist WHERE id= :id", id=session["user_id"])

    return render_template("index.html", ticketss=updatedportfolio, cash=usd(updatedcash[0]["cash"]),\
                            total=usd(totalcash))


@app.route("/book", methods=["GET", "POST"])
@login_required
def book():
    """Buy shares of stock"""
    if request.method == "GET":
        return render_template("book.html")
    else:
        # make sure valid station

        station1 = lookup(request.form.get("station1"))
        if not station1:
            return apology("Must enter valid station")
            # make sure valid shares
        station2 = lookup(request.form.get("station2"))
        if not station2:
            return apology("Must enter valid station")

        # check how much cash does user have
        cash = db.execute("SELECT cash FROM users WHERE id = :id", id = session["user_id"])

        station1 = lookup(request.form.get("pickup"))
        station2 = lookup(request.form.get("destination"))
        symbol = stock['symbol']
        price = pricelist['price']

        if total_tickets * price > cash[0]["price"]:
            return apology("You don't have enough money!")

        # update to history
        transaction = db.execute("INSERT INTO history (symbol, shares, price, id) VALUES(:symbol, :shares, :price, :id)",\
                                    symbol=stock["symbol"],
                                    shares=shares,
                                    price=usd(stock["price"]),
                                    id=session["user_id"])

        # update users cash
        db.execute("UPDATE users SET cash = cash - :purchase WHERE id = :id", id=session["user_id"],\
                    purchase=ticket["price"] * totaltickets


            db.execute("INSERT INTO pricelist (station1,station2, price,totaltickets, total, id) VALUES ( :station1,:station2 :price,\:price, :totaltickets, :total, :id)",
                        station1=pricelist["station1"], station2=pricelist["station2"],price=pricelist["price"], shares=shares, \ price=usd(stock["price"]), total=usd(shares * stock["price"]), id=session["user_id"])
        else:
            ticketstotal = usertickets[0]["tickets"] +
            db.execute("UPDATE pricelist SET tickets= :tickets WHERE id= :id AND symbol= :symbol",\
                        tickets=ticketstotal, id=session["user_id"], symbol=stock["symbol"])

        return redirect(url_for("index") )

@app.route("/history")
@login_required
def history():
    """Show history of transactions"""
    history = db.execute("SELECT date,source, destination, transaction FROM history WHERE id= :id", id= session["user_id"])
    return render_template("history.html", histories = history)


@app.route("/login", methods=["GET", "POST"])
def login():
    """Log user in"""

    # Forget any user_id
    session.clear()

    # User reached route via POST (as by submitting a form via POST)
    if request.method == "POST":

        # Ensure username was submitted
        if not request.form.get("username"):
            return apology("must provide username", 403)

        # Ensure password was submitted
        elif not request.form.get("password"):
            return apology("must provide password", 403)

        # Query database for username
        rows = db.execute("SELECT * FROM users WHERE username = :username",
                          username=request.form.get("username"))

        # Ensure username exists and password is correct
        if len(rows) != 1 or not check_password_hash(rows[0]["hash"], request.form.get("password")):
            return apology("invalid username and/or password", 403)

        # Remember which user has logged in
        session["user_id"] = rows[0]["id"]

        # Redirect user to home page
        return redirect("/")

    # User reached route via GET (as by clicking a link or via redirect)
    else:
        return render_template("login.html")


@app.route("/logout")
def logout():
    """Log user out"""

    # Forget any user_id
    session.clear()

    # Redirect user to login form
    return redirect("/")


@app.route("/register", methods=["GET", "POST"])
def register():
    """Register user"""
    if request.method == "POST":

        # get the username
        username = request.form.get("username")
        if not username:
            return apology("Missing username")
        # get password and confirmation
        password = request.form.get("password")
        if not password:
            return apology("Missing password")

        confirmation = request.form.get("confirmation")
        if password != confirmation:
            return apology("Password doesn't match")

        # encrypt password
        hashp = generate_password_hash(password)

        # insert user into users, check username is unique
        result = db.execute("INSERT INTO users (username, hash) VALUES(:username, :hash)",\
                                username=request.form.get("username"), hash=hashp)
        if not result:
            return apology("Username already existed")

        # store user id
        # user_id = db.execute("SELECT id FROM users WHERE username IS username", username=request.form.get("username"))  user_id[0]["id"]
        session["user_id"] = result
        return redirect(url_for("index"))

    else:
        return render_template("register.html")


@app.route("/cancel", methods=["GET", "POST"])
@login_required
def cancel():

    if request.method == "GET":

        ticket = db.execute("SELECT ticket_no FROM pricelist WHERE id= :id", id=session["user_id"])
        return render_template("cancel.html", ticket_no=ticket_no)


    else:
        cancel = request.form.get("ticketno")
        if not cancel:
            return apology("Invalid ticket no")

        shares = int(request.form.get("shares"))
        if not ticketno:
            return apology("Must enter ticket number")


        usertickets = db.execute("SELECT ticket FROM pricelist WHERE id= :id AND ticket= :ticket",\
                                id=session["user_id"], ticket=pricelist["ticket"])


        # update to history
        db.execute("INSERT INTO history (station1,station2, price, id) VALUES(:station1, :station2, :price, :id)",\
        station1=pricelist["station1"],station1=pricelist["station1"], price=usd(stock["price"]), id=session["user_id"])

        # update users cash
        db.execute("UPDATE users SET cash = cash +:purchase WHERE id = :id", id=session["user_id"],\
                    purchase=ticket["price"] * float(shares))

        # update portfolio
        if (usertickets[0]["shares"]-shares == 0):
            db.execute("DELETE FROM pricelist WHERE id= :id AND ticket_no=:ticket_no", id=session["user_id"], symbol=stock["symbol"])
        else:
            db.execute("UPDATE pricelist SET shares= :shares WHERE id= :id AND symbol= :symbol",\
                        shares=sharestotal, id=session["user_id"], symbol=stock["symbol"])

    return redirect(url_for("index"))


def errorhandler(e):
    """Handle error"""
    return apology(e.name, e.code)


# listen for errors
for code in default_exceptions:
    app.errorhandler(code)(errorhandler)
