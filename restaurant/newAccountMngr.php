<!DOCTYPE html>

<title>NewAccountMngr</title>

<form action="insertMngr.php" method="post">
    <table border="0" width="30%" align="center">
        <tr>
            <td colspan="2" align="center"><h1>Sign Up</h1></td>
        </tr>
        <tr>
            <td width="40%" align="right">Firtsname: </td>
            <td width="60%" align="center">
                <input type="text" name="name" placeholder="Your username" required />
            </td>
        </tr>
        <tr>
            <td width="40%" align="right">Lastname: </td>
            <td width="60%" align="center">
                <input type="text" name="phoneNum" placeholder="Your Phone Number" required />
            </td>
        </tr>
        <tr>
            <td width="40%" align="right">Username: </td>
            <td width="60%" align="center">
                <input type="text" name="address" placeholder="Your Address" required />
            </td>
        </tr>
        <tr>
            <td width="40%" align="right">Email: </td>
            <td width="60%" align="center">
                <input type="email" name="email" placeholder="Your email" required />
            </td>
        </tr>
        <tr>
            <td width="40%" align="right">Password: </td>
            <td width="60%" align="center">
                <input type="Password" name="password" placeholder="Your Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required />
            </td>
        </tr>
        <tr>
            <td width="40%" align="right">Confirm Password: </td>
            <td width="60%" align="center">
                <input type="Password" name="password" placeholder="Confirm Your Password" required />
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Sign Up" name="submit" />
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href="sign_in.php">Back to login page</a>
            </td>
        </tr>

    </table>
</form>
