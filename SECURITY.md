# Security Policy

## Supported Versions

This project is a historical, academic, or archived artifact. Because it relies on legacy dependencies and end-of-life (EOL) software runtimes (such as PHP versions 7.2 through 8.1 referenced in CVE-2026-109618 and CVE-2026-109619), **active support, patching, and security maintenance are discontinued.**

| Version | Supported          |
| ------- | ------------------ |
| < 8.2   | :x: No (Archived)  |
| 8.2.x+  | :white_check_mark: Yes (If Maintained) |

---

## Repository Status & Risk Warning

- **Archival / Student Artifact:** This repository is maintained strictly for historical, portfolio, or reference purposes. 
- **Production Prohibition:** **Do not deploy this codebase, its containers, or its associated Docker configurations to production or public-facing environments.** Doing so exposes systems to unpatched remote code execution (RCE) vulnerabilities, dependency exploits, and infrastructure compromise.
- **Automated Security Advisory Notice:** If you arrived here via automated vulnerability scanners or notifications (such as checks for PHP2Shell or obsolete base images), please note that updates will generally not be backported to this repository due to its frozen state.

---

## Reporting a Vulnerability

Because this project is unmaintained and archived:
1. **Do not open public GitHub issues** for routine vulnerability disclosures on legacy branches unless it presents an active credential leak or secret exposure.
2. If you discover an exposed private key, secret, or severe credential leak, please report it directly via GitHub's private vulnerability reporting or contact the repository owner.
3. For real-world operational security concerns regarding active systems, consult official alerts from [CISA](https://www.cisa.gov) or file a report with the [Internet Crime Complaint Center (IC3)](https://www.ic3.gov).
