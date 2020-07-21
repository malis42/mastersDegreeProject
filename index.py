from pexpect import pxssh
import sys

# You can read your pi's IP adress by typing 'ifconfig eth0' locally in raspeberry's terminal
HOSTNAME = ''
USERNAME = 'pi'
PASSWORD = 'password'


def main(user_hash):
    try:
        s = pxssh.pxssh()
        if s.login(HOSTNAME, USERNAME, PASSWORD, sync_multiplier=5, auto_prompt_reset=False):
            s.sendline(f"cd Desktop/adxlproject/ && python3 maintest.py {user_hash}")
            s.logout()
            print('Measure successfuly acquired')
        else:
            raise Exception("Problem with connection")
    except Exception as e:
        print(e)


if __name__ == "__main__":
    if len(sys.argv) > 1:
        user_hash = sys.argv[1]
        main(user_hash)
    else:
        print("Please pass user hash as argv[1] argument")


